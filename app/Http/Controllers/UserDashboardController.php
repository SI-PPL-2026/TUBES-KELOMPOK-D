<?php

namespace App\Http\Controllers;

use App\Models\AidRequest;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $activeTab = $request->query('tab', 'donations');
        if (!in_array($activeTab, ['donations', 'aid'], true)) {
            $activeTab = 'donations';
        }

        $donations = Donation::where('user_id', $user->id)
            ->latest()
            ->get();

        $aidRequests = AidRequest::where('user_id', $user->id)
            ->latest()
            ->get();

        $totalDonated = $donations->where('status', 'verified')->sum('amount');
        $verifiedDonationsCount = $donations->where('status', 'verified')->count();
        $approvedAidCount = $aidRequests->whereIn('status', ['approved', 'completed'])->count();

        return view('user.dashboard', compact(
            'user',
            'activeTab',
            'donations',
            'aidRequests',
            'totalDonated',
            'verifiedDonationsCount',
            'approvedAidCount'
        ));
    }

    public function donorDonations()
    {
        return redirect()->route('dashboard', ['tab' => 'donations']);
    }

    public function recipientAidRequests()
    {
        return redirect()->route('dashboard', ['tab' => 'aid']);
    }
}
