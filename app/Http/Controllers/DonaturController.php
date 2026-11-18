<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Notification;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonaturController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $donations = Donation::with('paymentMethod')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $totalDonation = $donations->where('status', 'verified')->sum('amount');
        $verifiedCount = $donations->where('status', 'verified')->count();
        $pendingCount = $donations->where('status', 'pending')->count();

        $notifications = Notification::where('user_id', $user->id)
            ->latest('created_at')
            ->take(5)
            ->get();

        return view('donatur.dashboard', compact('user', 'donations', 'totalDonation', 'verifiedCount', 'pendingCount', 'notifications'));
    }

    public function create()
    {
        $paymentMethods = PaymentMethod::where('is_active', true)->get();
        return view('donatur.create', compact('paymentMethods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_method_id' => 'required|exists:payment_methods,id',
            'amount' => 'required|numeric|min:10000',
            'message' => 'nullable|string|max:500',
            'transfer_proof' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $proofPath = $request->file('transfer_proof')->store('donations', 'public');

        $donation = Donation::create([
            'user_id' => Auth::id(),
            'payment_method_id' => $validated['payment_method_id'],
            'amount' => $validated['amount'],
            'message' => $validated['message'] ?? null,
            'transfer_proof' => $proofPath,
            'status' => 'pending',
        ]);

        // Notifikasi ke Admin
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::create([
                'user_id' => $admin->id,
                'title' => 'Donasi Masuk Baru',
                'message' => "Donasi baru sebesar Rp " . number_format($donation->amount, 0, ',', '.') . " dari " . Auth::user()->name . " menunggu verifikasi.",
                'type' => 'donation',
                'reference_id' => $donation->id,
            ]);
        }

        return redirect()->route('donatur.dashboard')
            ->with('success', 'Terima kasih atas kepedulian Anda! Donasi Anda telah dicatat dan sedang diverifikasi oleh admin SIDAPUR.');
    }

    public function show(Donation $donation)
    {
        if ($donation->user_id !== Auth::id()) {
            abort(403);
        }

        $donation->load(['paymentMethod', 'user']);
        return view('donatur.show', compact('donation'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('donatur.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            $validated['profile_photo'] = $request->file('profile_photo')->store('profiles', 'public');
        }

        $user->update($validated);

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
