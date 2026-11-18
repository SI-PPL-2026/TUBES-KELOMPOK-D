<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Donation;
use App\Models\Finance;
use App\Models\Notification;
use App\Models\Partner;
use App\Models\PaymentMethod;
use App\Models\Review;
use App\Models\StatusLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalInflow = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow = Finance::where('type', 'outflow')->sum('amount');
        $balance = $totalInflow - $totalOutflow;

        $pendingAidCount = AidRequest::where('status', 'pending')->count();
        $pendingDonationCount = Donation::where('status', 'pending')->count();
        $totalAidCompleted = AidRequest::where('status', 'completed')->count();
        $totalUsers = User::count();

        $recentAidRequests = AidRequest::with('user')->latest()->take(5)->get();
        $recentDonations = Donation::with(['user', 'paymentMethod'])->latest()->take(5)->get();

        // Data bulanan untuk grafik
        $monthlyInflows = [];
        $monthlyOutflows = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        for ($m = 1; $m <= 12; $m++) {
            $inflow = Finance::where('type', 'inflow')
                ->whereMonth('created_at', $m)
                ->whereYear('created_at', date('Y'))
                ->sum('amount');

            $outflow = Finance::where('type', 'outflow')
                ->whereMonth('created_at', $m)
                ->whereYear('created_at', date('Y'))
                ->sum('amount');

            $monthlyInflows[] = (float)$inflow;
            $monthlyOutflows[] = (float)$outflow;
        }

        return view('admin.dashboard', compact(
            'totalInflow',
            'totalOutflow',
            'balance',
            'pendingAidCount',
            'pendingDonationCount',
            'totalAidCompleted',
            'totalUsers',
            'recentAidRequests',
            'recentDonations',
            'months',
            'monthlyInflows',
            'monthlyOutflows'
        ));
    }

    // ---------------- AID REQUESTS (US-13) ----------------
    public function aidRequests(Request $request)
    {
        $status = $request->query('status');
        $query = AidRequest::with('user')->latest();

        if ($status) {
            $query->where('status', $status);
        }

        $aidRequests = $query->paginate(15);
        $counts = [
            'all' => AidRequest::count(),
            'pending' => AidRequest::where('status', 'pending')->count(),
            'verified' => AidRequest::where('status', 'verified')->count(),
            'approved' => AidRequest::where('status', 'approved')->count(),
            'completed' => AidRequest::where('status', 'completed')->count(),
            'rejected' => AidRequest::where('status', 'rejected')->count(),
        ];

        return view('admin.aid_requests.index', compact('aidRequests', 'status', 'counts'));
    }

    public function aidRequestDetail(AidRequest $aidRequest)
    {
        $aidRequest->load(['user', 'statusLogs.changedBy']);
        return view('admin.aid_requests.show', compact('aidRequest'));
    }

    public function updateAidRequestStatus(Request $request, AidRequest $aidRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:verified,approved,completed,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $oldStatus = $aidRequest->status;
        $newStatus = $validated['status'];
        $notes = $validated['admin_notes'] ?? null;

        $aidRequest->update([
            'status' => $newStatus,
            'admin_notes' => $notes,
        ]);

        StatusLog::create([
            'aid_request_id' => $aidRequest->id,
            'old_status' => $oldStatus,
            'new_status' => $newStatus,
            'notes' => $notes ?? "Status diubah menjadi {$newStatus} oleh Admin.",
            'changed_by' => Auth::id(),
        ]);

        // Jika status completed, catat pengeluaran kas di tabel finances jika belum ada
        if ($newStatus === 'completed') {
            $existingFinance = Finance::where('aid_request_id', $aidRequest->id)->first();
            if (!$existingFinance) {
                Finance::create([
                    'user_id' => Auth::id(),
                    'aid_request_id' => $aidRequest->id,
                    'donation_id' => null,
                    'type' => 'outflow',
                    'amount' => $aidRequest->nominal,
                    'description' => "Penyaluran bantuan {$aidRequest->assistance_type} ({$aidRequest->user->name} di {$aidRequest->stall_name})",
                    'proof' => $aidRequest->qris_proof,
                ]);
            }
        }

        // Notifikasi ke penerima
        $statusLabels = [
            'verified' => 'Telah Diverifikasi',
            'approved' => 'Disetujui untuk Pembayaran',
            'completed' => 'Telah Dibayarkan & Selesai',
            'rejected' => 'Ditolak',
        ];
        $label = $statusLabels[$newStatus] ?? $newStatus;

        Notification::create([
            'user_id' => $aidRequest->user_id,
            'title' => "Pengajuan Bantuan {$label}",
            'message' => "Status pengajuan bantuan Anda di {$aidRequest->stall_name} telah diperbarui menjadi '{$label}'. " . ($notes ? "Catatan: {$notes}" : ""),
            'type' => 'aid_request',
            'reference_id' => $aidRequest->id,
        ]);

        return back()->with('success', "Status pengajuan berhasil diperbarui menjadi {$label}.");
    }

    // ---------------- DONATIONS (US-14) ----------------
    public function donations(Request $request)
    {
        $status = $request->query('status');
        $query = Donation::with(['user', 'paymentMethod'])->latest();

        if ($status) {
            $query->where('status', $status);
        }

        $donations = $query->paginate(15);
        $counts = [
            'all' => Donation::count(),
            'pending' => Donation::where('status', 'pending')->count(),
            'verified' => Donation::where('status', 'verified')->count(),
            'rejected' => Donation::where('status', 'rejected')->count(),
        ];

        return view('admin.donations.index', compact('donations', 'status', 'counts'));
    }

    public function donationDetail(Donation $donation)
    {
        $donation->load(['user', 'paymentMethod']);
        return view('admin.donations.show', compact('donation'));
    }

    public function verifyDonation(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'status' => 'required|in:verified,rejected',
        ]);

        $donation->update(['status' => $validated['status']]);

        if ($validated['status'] === 'verified') {
            $existingFinance = Finance::where('donation_id', $donation->id)->first();
            if (!$existingFinance) {
                Finance::create([
                    'user_id' => Auth::id(),
                    'aid_request_id' => null,
                    'donation_id' => $donation->id,
                    'type' => 'inflow',
                    'amount' => $donation->amount,
                    'description' => "Penerimaan donasi dari {$donation->user->name} via " . ($donation->paymentMethod->name ?? 'Metode Pembayaran'),
                    'proof' => $donation->transfer_proof,
                ]);
            }

            Notification::create([
                'user_id' => $donation->user_id,
                'title' => 'Donasi Terverifikasi',
                'message' => 'Terima kasih! Donasi Anda sebesar Rp ' . number_format($donation->amount, 0, ',', '.') . ' telah berhasil diverifikasi dan masuk kas bantuan.',
                'type' => 'donation',
                'reference_id' => $donation->id,
            ]);
        } else {
            Notification::create([
                'user_id' => $donation->user_id,
                'title' => 'Verifikasi Donasi Ditolak',
                'message' => 'Mohon maaf, bukti transfer donasi Anda tidak valid atau tidak terbaca. Silakan hubungi admin SIDAPUR.',
                'type' => 'donation',
                'reference_id' => $donation->id,
            ]);
        }

        return back()->with('success', 'Status donasi berhasil diperbarui.');
    }

    // ---------------- FINANCES (US-15) ----------------
    public function finances(Request $request)
    {
        $type = $request->query('type');
        $query = Finance::with(['user', 'aidRequest', 'donation'])->latest('created_at');

        if ($type) {
            $query->where('type', $type);
        }

        $finances = $query->paginate(20);
        $totalInflow = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow = Finance::where('type', 'outflow')->sum('amount');
        $balance = $totalInflow - $totalOutflow;

        return view('admin.finances.index', compact('finances', 'totalInflow', 'totalOutflow', 'balance', 'type'));
    }

    public function storeFinance(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:inflow,outflow',
            'amount' => 'required|numeric|min:1000',
            'description' => 'required|string|max:255',
            'proof' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $proofPath = null;
        if ($request->hasFile('proof')) {
            $proofPath = $request->file('proof')->store('finance_proofs', 'public');
        }

        Finance::create([
            'user_id' => Auth::id(),
            'aid_request_id' => null,
            'donation_id' => null,
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
            'proof' => $proofPath,
        ]);

        return back()->with('success', 'Catatan keuangan kas baru berhasil ditambahkan.');
    }

    // ---------------- PAYMENT METHODS (US-16) ----------------
    public function paymentMethods()
    {
        $paymentMethods = PaymentMethod::latest()->get();
        return view('admin.payment_methods.index', compact('paymentMethods'));
    }

    public function storePaymentMethod(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'account_name' => 'required|string|max:100',
            'qr_image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'is_active' => 'nullable|boolean',
        ]);

        $qrPath = null;
        if ($request->hasFile('qr_image')) {
            $qrPath = $request->file('qr_image')->store('payment_qris', 'public');
        }

        PaymentMethod::create([
            'name' => $validated['name'],
            'account_number' => $validated['account_number'],
            'account_name' => $validated['account_name'],
            'qr_image' => $qrPath,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Metode pembayaran baru berhasil ditambahkan.');
    }

    public function updatePaymentMethod(Request $request, PaymentMethod $paymentMethod)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'account_number' => 'required|string|max:50',
            'account_name' => 'required|string|max:100',
            'qr_image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'is_active' => 'nullable|boolean',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'account_number' => $validated['account_number'],
            'account_name' => $validated['account_name'],
            'is_active' => $request->has('is_active'),
        ];

        if ($request->hasFile('qr_image')) {
            $updateData['qr_image'] = $request->file('qr_image')->store('payment_qris', 'public');
        }

        $paymentMethod->update($updateData);

        return back()->with('success', 'Metode pembayaran berhasil diperbarui.');
    }

    public function destroyPaymentMethod(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return back()->with('success', 'Metode pembayaran berhasil dihapus.');
    }

    // ---------------- USERS (US-12) ----------------
    public function users(Request $request)
    {
        $role = $request->query('role');
        $query = User::latest();

        if ($role) {
            $query->where('role', $role);
        }

        $users = $query->paginate(20);
        return view('admin.users.index', compact('users', 'role'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required|in:admin,donatur,penerima',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user->update($validated);

        return back()->with('success', 'Peran dan status pengguna berhasil diperbarui.');
    }

    public function destroyUser(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();
        return back()->with('success', 'Pengguna berhasil dihapus.');
    }

    // ---------------- ARTICLES (US-27) ----------------
    public function articles()
    {
        $articles = Article::with('author')->latest()->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function storeArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $thumbPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbPath = $request->file('thumbnail')->store('articles', 'public');
        }

        Article::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(5),
            'content' => $validated['content'],
            'thumbnail' => $thumbPath,
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Artikel kegiatan baru berhasil diterbitkan.');
    }

    public function destroyArticle(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Artikel berhasil dihapus.');
    }

    // ---------------- DOCUMENTATIONS (US-26) ----------------
    public function documentations()
    {
        $documentations = Documentation::with('author')->latest()->paginate(15);
        return view('admin.documentations.index', compact('documentations'));
    }

    public function storeDocumentation(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $imgPath = $request->file('image')->store('documentations', 'public');

        Documentation::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'image_path' => $imgPath,
            'created_by' => Auth::id(),
        ]);

        return back()->with('success', 'Foto dokumentasi penyaluran baru berhasil ditambahkan.');
    }

    public function destroyDocumentation(Documentation $documentation)
    {
        $documentation->delete();
        return back()->with('success', 'Dokumentasi berhasil dihapus.');
    }

    // ---------------- PARTNERS (US-35) ----------------
    public function partners()
    {
        $partners = Partner::latest()->paginate(15);
        return view('admin.partners.index', compact('partners'));
    }

    public function updatePartnerStatus(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $partner->update(['status' => $validated['status']]);

        return back()->with('success', 'Status mitra / kolaborasi berhasil diperbarui.');
    }

    public function destroyPartner(Partner $partner)
    {
        $partner->delete();
        return back()->with('success', 'Data mitra berhasil dihapus.');
    }

    // ---------------- REVIEWS (US-34) ----------------
    public function reviews()
    {
        $reviews = Review::with('user')->latest()->paginate(20);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function toggleReviewVisibility(Review $review)
    {
        $review->update(['is_visible' => !$review->is_visible]);
        $status = $review->is_visible ? 'ditampilkan ke publik' : 'disembunyikan dari publik';
        return back()->with('success', "Ulasan berhasil {$status}.");
    }

    public function destroyReview(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
