<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Notification;
use App\Models\StatusLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PenerimaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $aidRequests = AidRequest::where('user_id', $user->id)->latest()->get();
        $activeRequest = AidRequest::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'verified', 'approved'])
            ->latest()
            ->first();

        $notifications = Notification::where('user_id', $user->id)
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('penerima.dashboard', compact('user', 'aidRequests', 'activeRequest', 'notifications'));
    }

    public function create()
    {
        $user = Auth::user();

        // Cek jika masih ada pengajuan yang aktif/berjalan
        $activeRequest = AidRequest::where('user_id', $user->id)
            ->whereIn('status', ['pending', 'verified', 'approved'])
            ->first();

        if ($activeRequest) {
            return redirect()->route('penerima.dashboard')
                ->with('warning', 'Anda masih memiliki pengajuan bantuan yang sedang diproses. Mohon tunggu hingga proses selesai.');
        }

        return view('penerima.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'assistance_type' => 'required|string|max:100',
            'reason' => 'required|string|min:15',
            'stall_name' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:5000|max:50000',
            'ktm_photo' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'qris_proof' => 'required|image|mimes:jpeg,png,jpg|max:3072',
            'university' => 'required|string|max:255',
            'student_id' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        // Simpan / update data diri user
        $user->update([
            'university' => $validated['university'],
            'student_id' => $validated['student_id'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
        ]);

        // Upload files
        $ktmPath = $request->file('ktm_photo')->store('ktm_photos', 'public');
        $qrisPath = $request->file('qris_proof')->store('qris_proofs', 'public');

        $aidRequest = AidRequest::create([
            'user_id' => $user->id,
            'assistance_type' => $validated['assistance_type'],
            'reason' => $validated['reason'],
            'ktm_photo' => $ktmPath,
            'qris_proof' => $qrisPath,
            'stall_name' => $validated['stall_name'],
            'nominal' => $validated['nominal'],
            'status' => 'pending',
        ]);

        // Log status
        StatusLog::create([
            'aid_request_id' => $aidRequest->id,
            'old_status' => null,
            'new_status' => 'pending',
            'notes' => 'Pengajuan bantuan darurat baru berhasil diajukan oleh penerima.',
            'changed_by' => $user->id,
        ]);

        // Notifikasi untuk Admin
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'title' => 'Pengajuan Bantuan Baru',
                'message' => "Pengajuan dari {$user->name} ({$user->university}) sebesar Rp " . number_format($aidRequest->nominal, 0, ',', '.') . " di warung {$aidRequest->stall_name}.",
                'type' => 'aid_request',
                'reference_id' => $aidRequest->id,
            ]);
        }

        return redirect()->route('penerima.dashboard')
            ->with('success', 'Permohonan bantuan darurat Anda berhasil dikirim! Admin akan segera memverifikasi data dan foto KTM Anda.');
    }

    public function show(AidRequest $aidRequest)
    {
        if ($aidRequest->user_id !== Auth::id()) {
            abort(403);
        }

        $statusLogs = $aidRequest->statusLogs()->with('changedBy')->get();
        return view('penerima.show', compact('aidRequest', 'statusLogs'));
    }

    public function edit(AidRequest $aidRequest)
    {
        if ($aidRequest->user_id !== Auth::id()) {
            abort(403);
        }

        if ($aidRequest->status !== 'pending') {
            return redirect()->route('penerima.show', $aidRequest)
                ->with('warning', 'Pengajuan yang sudah diverifikasi tidak dapat diubah.');
        }

        return view('penerima.edit', compact('aidRequest'));
    }

    public function update(Request $request, AidRequest $aidRequest)
    {
        if ($aidRequest->user_id !== Auth::id()) {
            abort(403);
        }

        if ($aidRequest->status !== 'pending') {
            return redirect()->route('penerima.show', $aidRequest)
                ->with('warning', 'Pengajuan yang sudah diverifikasi tidak dapat diubah.');
        }

        $validated = $request->validate([
            'assistance_type' => 'required|string|max:100',
            'reason' => 'required|string|min:15',
            'stall_name' => 'required|string|max:255',
            'nominal' => 'required|numeric|min:5000|max:50000',
            'ktm_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'qris_proof' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $updateData = [
            'assistance_type' => $validated['assistance_type'],
            'reason' => $validated['reason'],
            'stall_name' => $validated['stall_name'],
            'nominal' => $validated['nominal'],
        ];

        if ($request->hasFile('ktm_photo')) {
            $updateData['ktm_photo'] = $request->file('ktm_photo')->store('ktm_photos', 'public');
        }

        if ($request->hasFile('qris_proof')) {
            $updateData['qris_proof'] = $request->file('qris_proof')->store('qris_proofs', 'public');
        }

        $aidRequest->update($updateData);

        StatusLog::create([
            'aid_request_id' => $aidRequest->id,
            'old_status' => 'pending',
            'new_status' => 'pending',
            'notes' => 'Penerima memperbarui rincian pengajuan bantuan.',
            'changed_by' => Auth::id(),
        ]);

        return redirect()->route('penerima.show', $aidRequest)
            ->with('success', 'Data pengajuan bantuan berhasil diperbarui!');
    }

    public function cancel(AidRequest $aidRequest)
    {
        if ($aidRequest->user_id !== Auth::id()) {
            abort(403);
        }

        if (!in_array($aidRequest->status, ['pending', 'verified'])) {
            return redirect()->route('penerima.show', $aidRequest)
                ->with('warning', 'Pengajuan tidak dapat dibatalkan pada status saat ini.');
        }

        $aidRequest->update(['status' => 'rejected', 'admin_notes' => 'Dibatalkan oleh pemohon.']);

        StatusLog::create([
            'aid_request_id' => $aidRequest->id,
            'old_status' => $aidRequest->status,
            'new_status' => 'rejected',
            'notes' => 'Pengajuan dibatalkan sendiri oleh pemohon bantuan.',
            'changed_by' => Auth::id(),
        ]);

        return redirect()->route('penerima.dashboard')
            ->with('info', 'Pengajuan bantuan telah berhasil dibatalkan.');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('penerima.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'university' => 'required|string|max:255',
            'student_id' => 'required|string|max:50',
            'address' => 'required|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $user->update($validated);

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
