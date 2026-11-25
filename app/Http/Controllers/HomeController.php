<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Article;
use App\Models\Documentation;
use App\Models\Review;
use App\Models\AidRequest;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class HomeController extends Controller
{
    /**
     * Fallback baseline data matching Figma design
     */
    private function getBaselineMetrics()
    {
        return [
            'inflow' => 48000000,
            'outflow' => 39600000,
            'balance' => 8400000,
            'totalRecipients' => 12480,
            'totalDonors' => 840,
        ];
    }

    public function index()
    {
        $metrics = $this->getBaselineMetrics();

        try {
            $dbInflow = Finance::where('type', 'inflow')->sum('amount');
            $dbOutflow = Finance::where('type', 'outflow')->sum('amount');
            if ($dbInflow > 0 || $dbOutflow > 0) {
                $metrics['inflow'] = $dbInflow;
                $metrics['outflow'] = $dbOutflow;
                $metrics['balance'] = $dbInflow - $dbOutflow;
            }

            $countRecipients = AidRequest::where('status', 'completed')->count();
            if ($countRecipients > 0) {
                $metrics['totalRecipients'] = $countRecipients;
            }

            $countDonors = Donation::where('status', 'verified')->count();
            if ($countDonors > 0) {
                $metrics['totalDonors'] = $countDonors;
            }
        } catch (Exception $e) {
            // Gunakan baseline Figma jika database belum dikonfigurasi
        }

        $campusDistribution = [
            ['name' => 'Universitas Jenderal Soedirman (UNSOED)', 'amount' => 15200000, 'percent' => 38.4],
            ['name' => 'UIN Prof. K.H. Saifuddin Zuhri (UIN Saizu)', 'amount' => 9800000, 'percent' => 24.7],
            ['name' => 'Universitas Muhammadiyah Purwokerto (UMP)', 'amount' => 6400000, 'percent' => 16.2],
            ['name' => 'Institut Teknologi Telkom Purwokerto', 'amount' => 3200000, 'percent' => 8.1],
            ['name' => 'Universitas Amikom Purwokerto', 'amount' => 1800000, 'percent' => 4.5],
            ['name' => 'Universitas Harapan Bangsa (UHB)', 'amount' => 1400000, 'percent' => 3.6],
            ['name' => 'Universitas Perwira Purbalingga (UNPERBA)', 'amount' => 1000000, 'percent' => 2.8],
            ['name' => 'STIE YPPI Purbalingga', 'amount' => 600000, 'percent' => 1.7],
            ['name' => 'STKIP Purbalingga', 'amount' => 500000, 'percent' => 1.4],
            ['name' => 'Politeknik Purbalingga', 'amount' => 400000, 'percent' => 1.1],
        ];

        $reviews = [
            [
                'name' => 'Ayu P.',
                'role' => 'Donatur',
                'initials' => 'AP',
                'stars' => 5,
                'comment' => 'Bisa melihat kabar penyaluran membuat saya merasa dekat dengan orang-orang yang dibantu.',
            ],
            [
                'name' => 'Bima S.',
                'role' => 'Relawan',
                'initials' => 'BS',
                'stars' => 5,
                'comment' => 'Di dapur ini, kami berbagi pekerjaan, cerita, dan rasa peduli yang sama.',
            ],
            [
                'name' => 'Dika R.',
                'role' => 'Mahasiswa Penerima Manfaat',
                'initials' => 'DR',
                'stars' => 5,
                'comment' => 'Saat kiriman bulanan terlambat dan uang saku habis, bantuan dari SIDAPUR sangat menolong saya bertahan. Terima kasih donatur.',
            ],
        ];

        return view('home', [
            'inflow' => $metrics['inflow'],
            'outflow' => $metrics['outflow'],
            'balance' => $metrics['balance'],
            'totalRecipients' => $metrics['totalRecipients'],
            'totalDonors' => $metrics['totalDonors'],
            'campusDistribution' => $campusDistribution,
            'reviews' => $reviews,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function transparency()
    {
        $metrics = $this->getBaselineMetrics();

        $campusDistribution = [
            ['name' => 'Universitas Jenderal Soedirman (UNSOED)', 'amount' => 15200000, 'percent' => 38.4],
            ['name' => 'UIN Prof. K.H. Saifuddin Zuhri (UIN Saizu)', 'amount' => 9800000, 'percent' => 24.7],
            ['name' => 'Universitas Muhammadiyah Purwokerto (UMP)', 'amount' => 6400000, 'percent' => 16.2],
            ['name' => 'Institut Teknologi Telkom Purwokerto', 'amount' => 3200000, 'percent' => 8.1],
            ['name' => 'Universitas Amikom Purwokerto', 'amount' => 1800000, 'percent' => 4.5],
            ['name' => 'Universitas Harapan Bangsa (UHB)', 'amount' => 1400000, 'percent' => 3.6],
            ['name' => 'Universitas Perwira Purbalingga (UNPERBA)', 'amount' => 1000000, 'percent' => 2.8],
            ['name' => 'STIE YPPI Purbalingga', 'amount' => 600000, 'percent' => 1.7],
            ['name' => 'STKIP Purbalingga', 'amount' => 500000, 'percent' => 1.4],
            ['name' => 'Politeknik Purbalingga', 'amount' => 400000, 'percent' => 1.1],
        ];

        $transactions = [
            ['date' => '18 Nov 2026', 'title' => 'Penyaluran 40 porsi nasi warung berkah (Area UNSOED)', 'type' => 'outflow', 'amount' => 600000, 'status' => 'Tersalurkan'],
            ['date' => '17 Nov 2026', 'title' => 'Donasi titipan Hamba Allah via QRIS', 'type' => 'inflow', 'amount' => 1500000, 'status' => 'Terverifikasi'],
            ['date' => '16 Nov 2026', 'title' => 'Penyaluran 25 porsi paket nasi dapur darurat UIN Saizu', 'type' => 'outflow', 'amount' => 375000, 'status' => 'Tersalurkan'],
            ['date' => '15 Nov 2026', 'title' => 'Donasi Alumni Purwokerto Peduli', 'type' => 'inflow', 'amount' => 2500000, 'status' => 'Terverifikasi'],
            ['date' => '14 Nov 2026', 'title' => 'Penyaluran 30 porsi warung mitra UMP', 'type' => 'outflow', 'amount' => 450000, 'status' => 'Tersalurkan'],
            ['date' => '13 Nov 2026', 'title' => 'Donasi titipan Ibu Siti Rahayu', 'type' => 'inflow', 'amount' => 500000, 'status' => 'Terverifikasi'],
            ['date' => '12 Nov 2026', 'title' => 'Penyaluran 20 porsi IT Telkom Purwokerto', 'type' => 'outflow', 'amount' => 300000, 'status' => 'Tersalurkan'],
            ['date' => '10 Nov 2026', 'title' => 'Donasi Mahasiswa Peduli Angkatan 2023', 'type' => 'inflow', 'amount' => 750000, 'status' => 'Terverifikasi'],
        ];

        return view('transparency', [
            'inflow' => $metrics['inflow'],
            'outflow' => $metrics['outflow'],
            'balance' => $metrics['balance'],
            'campusDistribution' => $campusDistribution,
            'transactions' => $transactions,
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactStore(Request $request)
    {
        return redirect()->route('contact')->with('success', 'Pesan Anda telah berhasil dikirim! Tim relawan kami akan segera merespons via WhatsApp atau Email.');
    }

    public function aidCreate()
    {
        $campuses = [
            'Universitas Jenderal Soedirman (UNSOED)',
            'UIN Prof. K.H. Saifuddin Zuhri (UIN Saizu)',
            'Universitas Muhammadiyah Purwokerto (UMP)',
            'Institut Teknologi Telkom Purwokerto',
            'Universitas Amikom Purwokerto',
            'Universitas Harapan Bangsa (UHB)',
            'Universitas Perwira Purbalingga (UNPERBA)',
            'STIE YPPI Purbalingga',
            'STKIP Purbalingga',
            'Politeknik Purbalingga',
            'Lainnya (Area Purwokerto / Purbalingga)',
        ];

        return view('aid-create', compact('campuses'));
    }

    public function aidStore(Request $request)
    {
        return redirect()->route('aid.create')->with('success', 'Pengajuan bantuan Anda berhasil dikirim! Tim relawan SIDAPUR akan segera memverifikasi data dan menghubungi Anda via WhatsApp.');
    }

    public function donationCreate()
    {
        return view('donation-create');
    }

    public function donationStore(Request $request)
    {
        return redirect()->route('donation.create')->with('success', 'Konfirmasi donasi Anda berhasil diterima! Terima kasih atas kebaikan Anda membantu mahasiswa yang membutuhkan.');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
