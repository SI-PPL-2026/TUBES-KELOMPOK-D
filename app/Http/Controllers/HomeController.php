<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Donation;
use App\Models\Finance;
use App\Models\Partner;
use App\Models\PaymentMethod;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return $this->beranda();
    }

    /**
     * Halaman beranda utama SIDAPUR (beranda-sidapur.blade.php)
     */
    public function beranda()
    {
        $totalInflow    = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow   = Finance::where('type', 'outflow')->sum('amount');
        $balance        = $totalInflow - $totalOutflow;

        $totalAidRequests = AidRequest::count();
        $totalDonations   = Donation::where('status', 'verified')->count();
        $articles         = Article::latest()->take(3)->get();
        $reviews          = Review::with('user')->where('is_visible', true)->latest()->take(3)->get();

        return view('beranda-sidapur', compact(
            'totalInflow', 'totalOutflow', 'balance',
            'totalAidRequests', 'totalDonations',
            'articles', 'reviews'
        ));
    }

    /**
     * Halaman Bantu Donasi (publik) – menyediakan payment methods untuk form
     */
    public function bantuDonasi()
    {
        $paymentMethods = PaymentMethod::where('is_active', true)->get();
        return view('bantu-donasi', compact('paymentMethods'));
    }

    /**
     * Halaman Transparansi publik
     */
    public function transparansiPublik()
    {
        $totalInflow  = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow = Finance::where('type', 'outflow')->sum('amount');
        $balance      = $totalInflow - $totalOutflow;

        return view('transparansi', compact('totalInflow', 'totalOutflow', 'balance'));
    }

    public function about()
    {
        $partners = Partner::where('status', 'approved')->get();
        return view('about', compact('partners'));
    }

    public function transparency()
    {
        $totalInflow = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow = Finance::where('type', 'outflow')->sum('amount');
        $currentBalance = $totalInflow - $totalOutflow;
        $completedAidCount = AidRequest::where('status', 'completed')->count();

        // Mutasi keuangan terbaru (Data publik yang aman tanpa identitas sensitif)
        $finances = Finance::latest('created_at')->paginate(15);

        // Data bulanan untuk grafik Chart.js
        $monthlyData = [];
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
        
        for ($m = 1; $m <= 12; $m++) {
            $inflowMonth = Finance::where('type', 'inflow')
                ->whereMonth('created_at', $m)
                ->whereYear('created_at', date('Y'))
                ->sum('amount');

            $outflowMonth = Finance::where('type', 'outflow')
                ->whereMonth('created_at', $m)
                ->whereYear('created_at', date('Y'))
                ->sum('amount');

            $monthlyData[] = [
                'month' => $months[$m - 1],
                'inflow' => (float)$inflowMonth,
                'outflow' => (float)$outflowMonth,
            ];
        }

        return view('transparency', compact(
            'totalInflow',
            'totalOutflow',
            'currentBalance',
            'completedAidCount',
            'finances',
            'monthlyData'
        ));
    }

    public function articles()
    {
        $articles = Article::with('author')->latest()->paginate(9);
        return view('articles.index', compact('articles'));
    }

    public function articleDetail($slug)
    {
        $article = Article::with('author')->where('slug', $slug)->firstOrFail();
        $recentArticles = Article::where('id', '!=', $article->id)->latest()->take(4)->get();
        return view('articles.show', compact('article', 'recentArticles'));
    }

    public function documentations()
    {
        $documentations = Documentation::with('author')->latest()->paginate(12);
        return view('documentations.index', compact('documentations'));
    }

    public function collaboration()
    {
        $partners = Partner::where('status', 'approved')->get();
        return view('collaboration', compact('partners'));
    }

    public function submitCollaboration(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'proposal_details' => 'required|string',
        ]);

        Partner::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'proposal_details' => $validated['proposal_details'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Pengajuan kolaborasi berhasil dikirim! Tim pengelola Nasi Darurat akan segera menghubungi Anda.');
    }

    public function reviews()
    {
        $reviews = Review::with('user')->where('is_visible', true)->latest()->paginate(12);
        return view('reviews', compact('reviews'));
    }

    public function storeReview(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan masuk untuk menulis ulasan.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_visible' => true,
        ]);

        return back()->with('success', 'Terima kasih atas ulasan dan masukan Anda!');
    }

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }
}
