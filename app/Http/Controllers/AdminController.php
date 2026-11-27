<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Donation;
use App\Models\Finance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pendingAidCount = AidRequest::where('status', 'pending')->count();
        $pendingDonationCount = Donation::where('status', 'pending')->count();
        $totalInflow = Finance::where('type', 'inflow')->sum('amount');
        $totalOutflow = Finance::where('type', 'outflow')->sum('amount');
        $balance = $totalInflow - $totalOutflow;

        $totalRegularUsers = User::where('role', '!=', 'admin')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $recentAidRequests = AidRequest::with('user')->latest()->take(5)->get();
        $recentDonations = Donation::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'pendingAidCount',
            'pendingDonationCount',
            'totalInflow',
            'totalOutflow',
            'balance',
            'totalRegularUsers',
            'totalAdmins',
            'recentAidRequests',
            'recentDonations'
        ));
    }

    public function aidRequests(Request $request)
    {
        $status = $request->query('status');
        $query = AidRequest::with('user')->latest();

        if ($status && in_array($status, ['pending', 'approved', 'rejected', 'completed'], true)) {
            $query->where('status', $status);
        }

        $aidRequests = $query->get();

        return view('admin.aid-requests', compact('aidRequests', 'status'));
    }

    public function updateAidStatus(Request $request, AidRequest $aidRequest)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['pending', 'approved', 'rejected', 'completed'])],
            'nominal' => ['nullable', 'numeric', 'min:0'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $aidRequest->update([
            'status' => $validated['status'],
            'nominal' => $validated['nominal'] ?? $aidRequest->nominal,
            'admin_notes' => $validated['admin_notes'] ?? $aidRequest->admin_notes,
        ]);

        if ($validated['status'] === 'completed' && ($aidRequest->nominal ?? 0) > 0) {
            Finance::firstOrCreate(
                ['aid_request_id' => $aidRequest->id],
                [
                    'user_id' => Auth::id(),
                    'type' => 'outflow',
                    'amount' => $aidRequest->nominal,
                    'description' => 'Penyaluran bantuan untuk ' . $aidRequest->applicant_name . ' (' . $aidRequest->university . ')',
                ]
            );
        }

        return redirect()->route('admin.aid-requests')
            ->with('success', 'Status pengajuan bantuan berhasil diperbarui.');
    }

    public function donations(Request $request)
    {
        $status = $request->query('status');
        $query = Donation::with('user')->latest();

        if ($status && in_array($status, ['pending', 'verified', 'rejected'], true)) {
            $query->where('status', $status);
        }

        $donations = $query->get();

        return view('admin.donations', compact('donations', 'status'));
    }

    public function updateDonationStatus(Request $request, Donation $donation)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['pending', 'verified', 'rejected'])],
        ]);

        $donation->update([
            'status' => $validated['status'],
        ]);

        if ($validated['status'] === 'verified') {
            Finance::firstOrCreate(
                ['donation_id' => $donation->id],
                [
                    'user_id' => Auth::id(),
                    'type' => 'inflow',
                    'amount' => $donation->amount,
                    'description' => 'Donasi terverifikasi dari ' . $donation->donor_name,
                ]
            );
        }

        return redirect()->route('admin.donations')
            ->with('success', 'Status donasi berhasil diperbarui.');
    }

    public function finances()
    {
        $finances = Finance::with('user')->latest()->get();
        $totalInflow = $finances->where('type', 'inflow')->sum('amount');
        $totalOutflow = $finances->where('type', 'outflow')->sum('amount');
        $balance = $totalInflow - $totalOutflow;

        return view('admin.finances', compact('finances', 'totalInflow', 'totalOutflow', 'balance'));
    }

    public function storeFinance(Request $request)
    {
        $validated = $request->validate([
            'type' => ['required', Rule::in(['inflow', 'outflow'])],
            'amount' => ['required', 'numeric', 'min:1000'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        Finance::create([
            'user_id' => Auth::id(),
            'type' => $validated['type'],
            'amount' => $validated['amount'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.finances')
            ->with('success', 'Catatan kas operasional berhasil ditambahkan.');
    }

    public function users(Request $request)
    {
        $role = $request->query('role');
        $query = User::withCount(['donations', 'aidRequests'])->latest();

        if ($role && in_array($role, ['user', 'admin'], true)) {
            $query->where('role', $role);
        }

        $users = $query->get();

        return view('admin.users', compact('users', 'role'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', Rule::in(['user', 'admin'])],
            'status' => ['required', Rule::in(['active', 'inactive'])],
        ]);

        if ($user->id === Auth::id() && $validated['role'] !== 'admin') {
            return redirect()->route('admin.users')
                ->with('error', 'Anda tidak dapat mengubah role akun Anda sendiri.');
        }

        $user->update($validated);

        return redirect()->route('admin.users')
            ->with('success', 'Data pengguna berhasil diperbarui.');
    }
}
