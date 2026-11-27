<?php

namespace Database\Seeders;

use App\Models\AidRequest;
use App\Models\Donation;
use App\Models\Finance;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@sidapur.id'],
            [
                'name' => 'Admin Pengurus SIDAPUR',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567890',
                'status' => 'active',
            ]
        );

        $user = User::firstOrCreate(
            ['email' => 'user@sidapur.id'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password'),
                'role' => 'user',
                'phone' => '081298765432',
                'university' => 'Universitas Jenderal Soedirman (UNSOED)',
                'student_id' => 'F1D022001',
                'status' => 'active',
            ]
        );

        if (Donation::count() === 0) {
            $verifiedDonation = Donation::create([
                'user_id' => $user->id,
                'donor_name' => $user->name,
                'whatsapp' => $user->phone,
                'amount' => 150000,
                'message' => 'Semoga bermanfaat untuk teman-teman mahasiswa.',
                'status' => 'verified',
            ]);

            Donation::create([
                'user_id' => $user->id,
                'donor_name' => 'Hamba Allah',
                'whatsapp' => $user->phone,
                'amount' => 50000,
                'message' => 'Semangat kuliahnya!',
                'status' => 'pending',
            ]);

            Finance::create([
                'user_id' => $admin->id,
                'donation_id' => $verifiedDonation->id,
                'type' => 'inflow',
                'amount' => 150000,
                'description' => 'Donasi terverifikasi dari ' . $user->name,
            ]);
        }

        if (AidRequest::count() === 0) {
            AidRequest::create([
                'user_id' => $user->id,
                'applicant_name' => $user->name,
                'whatsapp' => $user->phone,
                'university' => $user->university ?? 'Universitas Jenderal Soedirman (UNSOED)',
                'nim' => $user->student_id ?? 'F1D022001',
                'assistance_type' => 'porsi_makan',
                'reason' => 'Kiriman bulanan terlambat, membutuhkan bantuan makan siang di area kampus.',
                'nominal' => 15000,
                'status' => 'pending',
            ]);
        }
    }
}
