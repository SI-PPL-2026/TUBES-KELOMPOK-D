<?php

namespace Tests\Feature;

use App\Models\AidRequest;
use App\Models\Donation;
use App\Models\Finance;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SidapurPagesTest extends TestCase
{
    public function test_public_pages_load_successfully(): void
    {
        $urls = [
            '/',
            '/tentang',
            '/transparansi',
            '/artikel',
            '/dokumentasi',
            '/kolaborasi',
            '/ulasan',
            '/syarat-ketentuan',
            '/kebijakan-privasi',
            '/masuk',
            '/daftar',
        ];

        foreach ($urls as $url) {
            $response = $this->get($url);
            $response->assertStatus(200);
        }
    }

    public function test_admin_pages_accessible_by_admin(): void
    {
        $admin = User::where('role', 'admin')->first();
        $this->actingAs($admin);

        $this->get('/admin/dashboard')->assertStatus(200);
        $this->get('/admin/pengajuan')->assertStatus(200);
        $this->get('/admin/donasi')->assertStatus(200);
        $this->get('/admin/keuangan')->assertStatus(200);
        $this->get('/admin/metode-pembayaran')->assertStatus(200);
        $this->get('/admin/users')->assertStatus(200);
        $this->get('/admin/artikel')->assertStatus(200);
        $this->get('/admin/dokumentasi')->assertStatus(200);
        $this->get('/admin/mitra')->assertStatus(200);
        $this->get('/admin/ulasan')->assertStatus(200);
    }

    public function test_donatur_pages_accessible_by_donatur(): void
    {
        $donatur = User::where('role', 'donatur')->first();
        $this->actingAs($donatur);

        $this->get('/donatur/dashboard')->assertStatus(200);
        $this->get('/donatur/donasi/titip')->assertStatus(200);
        $this->get('/donatur/profil')->assertStatus(200);
    }

    public function test_penerima_pages_accessible_by_penerima(): void
    {
        $penerima = User::where('role', 'penerima')->first();
        $this->actingAs($penerima);

        $this->get('/penerima/dashboard')->assertStatus(200);
        $this->get('/penerima/profil')->assertStatus(200);
    }

    public function test_donation_verification_syncs_with_finance_inflow(): void
    {
        $admin = User::where('role', 'admin')->first();
        $donatur = User::where('role', 'donatur')->first();
        $pm = PaymentMethod::first();

        $donation = Donation::create([
            'user_id' => $donatur->id,
            'payment_method_id' => $pm->id,
            'amount' => 75000,
            'message' => 'Tes donasi untuk porsi makan siang',
            'transfer_proof' => 'sample.jpg',
            'status' => 'pending',
        ]);

        $this->actingAs($admin);
        $response = $this->post("/admin/donasi/{$donation->id}/verifikasi", [
            'status' => 'verified',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('donations', [
            'id' => $donation->id,
            'status' => 'verified',
        ]);

        $this->assertDatabaseHas('finances', [
            'donation_id' => $donation->id,
            'type' => 'inflow',
            'amount' => 75000,
        ]);
    }

    public function test_aid_request_completion_syncs_with_finance_outflow(): void
    {
        $admin = User::where('role', 'admin')->first();
        $penerima = User::where('role', 'penerima')->first();

        $aidRequest = AidRequest::create([
            'user_id' => $penerima->id,
            'assistance_type' => 'Makanan Siap Santap',
            'reason' => 'Uang saku menipis dan menunggu kiriman keluarga.',
            'ktm_photo' => 'sample_ktm.jpg',
            'qris_proof' => 'sample_qris.jpg',
            'stall_name' => 'Warteg Sedap Rasa Grendeng',
            'nominal' => 20000,
            'status' => 'pending',
        ]);

        $this->actingAs($admin);
        $response = $this->post("/admin/pengajuan/{$aidRequest->id}/status", [
            'status' => 'completed',
            'admin_notes' => 'Telah dibayar ke QRIS Warteg Sedap Rasa.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('aid_requests', [
            'id' => $aidRequest->id,
            'status' => 'completed',
        ]);

        $this->assertDatabaseHas('finances', [
            'aid_request_id' => $aidRequest->id,
            'type' => 'outflow',
            'amount' => 20000,
        ]);
    }
}
