<?php

namespace Database\Seeders;

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
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        $admin = User::firstOrCreate(
            ['email' => 'admin@sidapur.org'],
            [
                'name' => 'Admin Nasi Darurat',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '081234567890',
                'university' => 'Pengelola SIDAPUR',
                'student_id' => 'ADM-001',
                'address' => 'Purbalingga & Purwokerto',
                'status' => 'active',
            ]
        );

        $donatur1 = User::firstOrCreate(
            ['email' => 'donatur@sidapur.org'],
            [
                'name' => 'Budi Darmawan',
                'password' => Hash::make('password'),
                'role' => 'donatur',
                'phone' => '081398765432',
                'university' => 'Alumni UNSOED',
                'student_id' => null,
                'address' => 'Purwokerto Selatan',
                'status' => 'active',
            ]
        );

        $donatur2 = User::firstOrCreate(
            ['email' => 'siti@gmail.com'],
            [
                'name' => 'Siti Rahmah',
                'password' => Hash::make('password'),
                'role' => 'donatur',
                'phone' => '081987654321',
                'university' => 'Masyarakat Peduli',
                'student_id' => null,
                'address' => 'Purbalingga Lor',
                'status' => 'active',
            ]
        );

        $penerima1 = User::firstOrCreate(
            ['email' => 'rian@mhs.unsoed.ac.id'],
            [
                'name' => 'Rian Pratama',
                'password' => Hash::make('password'),
                'role' => 'penerima',
                'phone' => '085712345678',
                'university' => 'Universitas Jenderal Soedirman (UNSOED)',
                'student_id' => 'H1D022045',
                'address' => 'Kos Melati No. 12, Grendeng, Purwokerto Utara',
                'status' => 'active',
            ]
        );

        $penerima2 = User::firstOrCreate(
            ['email' => 'annisa@ump.ac.id'],
            [
                'name' => 'Annisa Putri',
                'password' => Hash::make('password'),
                'role' => 'penerima',
                'phone' => '085876543210',
                'university' => 'Universitas Muhammadiyah Purwokerto (UMP)',
                'student_id' => '220101089',
                'address' => 'Kos Barokah, Dukuhwaluh, Kembaran, Banyumas',
                'status' => 'active',
            ]
        );

        // 2. Payment Methods
        $pm1 = PaymentMethod::firstOrCreate(
            ['account_number' => '0001-9283-1122'],
            [
                'name' => 'QRIS Nasi Darurat (Semua Bank & E-Wallet)',
                'account_name' => 'Nasi Darurat Purbalingga-Purwokerto',
                'qr_image' => null,
                'is_active' => true,
            ]
        );

        $pm2 = PaymentMethod::firstOrCreate(
            ['account_number' => '0123-01-089765-53-4'],
            [
                'name' => 'Bank BRI',
                'account_name' => 'Yayasan Nasi Darurat Purbalingga',
                'qr_image' => null,
                'is_active' => true,
            ]
        );

        $pm3 = PaymentMethod::firstOrCreate(
            ['account_number' => '0461-234567'],
            [
                'name' => 'Bank BCA',
                'account_name' => 'Nasi Darurat Purbalingga',
                'qr_image' => null,
                'is_active' => true,
            ]
        );

        $pm4 = PaymentMethod::firstOrCreate(
            ['account_number' => '0812-3456-7890'],
            [
                'name' => 'GoPay / OVO / ShopeePay',
                'account_name' => 'Nasi Darurat Purbalingga',
                'qr_image' => null,
                'is_active' => true,
            ]
        );

        // 3. Articles
        Article::firstOrCreate(
            ['slug' => 'kisah-relawan-nasi-darurat-purwokerto'],
            [
                'title' => 'Kisah Relawan Nasi Darurat: Dari Satu Porsi untuk Pejuang Skripsi Purwokerto',
                'content' => "Berawal dari pengalaman pribadi sang pendiri yang pernah merantau dan kehabisan ongkos serta uang makan di Purwokerto, gerakan Nasi Darurat Purbalingga hadir untuk memastikan tidak ada satu pun mahasiswa perantau yang tertidur dalam keadaan lapar.\n\nKini dengan hadirnya sistem web SIDAPUR, proses verifikasi identitas mahasiswa lewat KTM dan penyaluran pembayaran ke warung makan menjadi jauh lebih tertib, cepat, dan transparan kepada para donatur.",
                'thumbnail' => null,
                'created_by' => $admin->id,
            ]
        );

        Article::firstOrCreate(
            ['slug' => 'kolaborasi-dengan-warung-lokal-banyumas-purbalingga'],
            [
                'title' => 'Kolaborasi Bersama Warung Makan Lokal Sekitar Kampus Purbalingga dan Purwokerto',
                'content' => "Untuk mempercepat bantuan makanan siap santap, SIDAPUR bekerjasama dengan warung makan lokal di sekitar area Grendeng, Karangwangkal, dan Dukuhwaluh. Mahasiswa penerima bantuan cukup memotret kode QRIS warung, dan bantuan langsung dibayarkan oleh pengelola secara non-tunai.",
                'thumbnail' => null,
                'created_by' => $admin->id,
            ]
        );

        Article::firstOrCreate(
            ['slug' => 'transparansi-donasi-dan-sdgs-zero-hunger'],
            [
                'title' => 'Mendukung SDGs 2: Memastikan Akses Pangan Layak bagi Mahasiswa Perantau',
                'content' => "Mahasiswa perantau merupakan salah satu kelompok yang rentan mengalami kerawanan pangan ketika kiriman orang tua terlambat atau biaya mendadak terjadi. Transparansi arus kas di SIDAPUR dibangun agar setiap rupiah donasi dari masyarakat dapat dipertanggungjawabkan secara terbuka.",
                'thumbnail' => null,
                'created_by' => $admin->id,
            ]
        );

        // 4. Documentations
        Documentation::firstOrCreate(
            ['title' => 'Penyaluran Nasi Bungkus Mahasiswa UNSOED Grendeng'],
            [
                'description' => 'Penyaluran bantuan makanan siang untuk mahasiswa tingkat akhir yang sedang mengerjakan tugas akhir di daerah Purwokerto Utara.',
                'image_path' => 'doc_sample1.jpg',
                'created_by' => $admin->id,
            ]
        );

        Documentation::firstOrCreate(
            ['title' => 'Bantuan Makanan Sehat untuk Anak Kos Sakit di Purbalingga'],
            [
                'description' => 'Bantuan makanan bergizi dan bubur ayam untuk mahasiswa yang sedang sakit di kos wilayah Purbalingga.',
                'image_path' => 'doc_sample2.jpg',
                'created_by' => $admin->id,
            ]
        );

        Documentation::firstOrCreate(
            ['title' => 'Kunjungan dan Koordinasi Warung Mitra di Dukuhwaluh'],
            [
                'description' => 'Koordinasi bersama pemilik warung makan mitra untuk mempermudah transaksi QRIS bantuan darurat.',
                'image_path' => 'doc_sample3.jpg',
                'created_by' => $admin->id,
            ]
        );

        // 5. Donations
        $donation1 = Donation::firstOrCreate(
            ['id' => 1],
            [
                'user_id' => $donatur1->id,
                'payment_method_id' => $pm2->id,
                'amount' => 250000.00,
                'message' => 'Semoga berkah untuk adik-adik mahasiswa di Purwokerto dan Purbalingga. Tetap semangat menuntut ilmu!',
                'transfer_proof' => 'sample_proof_1.jpg',
                'status' => 'verified',
            ]
        );

        $donation2 = Donation::firstOrCreate(
            ['id' => 2],
            [
                'user_id' => $donatur2->id,
                'payment_method_id' => $pm1->id,
                'amount' => 150000.00,
                'message' => 'Titip sedikit rezeki untuk yang membutuhkan. Salam hangat untuk pengelola.',
                'transfer_proof' => 'sample_proof_2.jpg',
                'status' => 'verified',
            ]
        );

        $donation3 = Donation::firstOrCreate(
            ['id' => 3],
            [
                'user_id' => $donatur1->id,
                'payment_method_id' => $pm3->id,
                'amount' => 50000.00,
                'message' => 'Semoga amanah dan tepat sasaran.',
                'transfer_proof' => 'sample_proof_3.jpg',
                'status' => 'pending',
            ]
        );

        // 6. Aid Requests
        $req1 = AidRequest::firstOrCreate(
            ['id' => 1],
            [
                'user_id' => $penerima1->id,
                'assistance_type' => 'Makanan Siap Santap',
                'reason' => 'Kiriman uang dari kampung terlambat sudah 3 hari, uang saku habis dan seharian belum makan.',
                'ktm_photo' => 'sample_ktm.jpg',
                'qris_proof' => 'sample_qris_warung.jpg',
                'stall_name' => 'Warteg Berkah Kampus Grendeng',
                'nominal' => 20000.00,
                'status' => 'completed',
                'admin_notes' => 'Data KTM valid, mahasiswa UNSOED aktif. Telah dibayar via QRIS Warteg Berkah Rp 20.000.',
            ]
        );

        StatusLog::firstOrCreate(
            ['aid_request_id' => $req1->id, 'new_status' => 'completed'],
            [
                'old_status' => 'approved',
                'notes' => 'Pembayaran QRIS berhasil dikonfirmasi dan makanan telah diterima.',
                'changed_by' => $admin->id,
            ]
        );

        $req2 = AidRequest::firstOrCreate(
            ['id' => 2],
            [
                'user_id' => $penerima2->id,
                'assistance_type' => 'Makanan Siap Santap',
                'reason' => 'Sedang demam di kos dan uang pegangan habis karena beli obat di apotek kemarin.',
                'ktm_photo' => 'sample_ktm2.jpg',
                'qris_proof' => 'sample_qris_warung2.jpg',
                'stall_name' => 'Warung Nasi UMP Dukuhwaluh',
                'nominal' => 18000.00,
                'status' => 'pending',
                'admin_notes' => null,
            ]
        );

        // 7. Finances
        Finance::firstOrCreate(
            ['id' => 1],
            [
                'user_id' => $admin->id,
                'aid_request_id' => null,
                'donation_id' => $donation1->id,
                'type' => 'inflow',
                'amount' => 250000.00,
                'description' => 'Penerimaan donasi dari Budi Darmawan via Bank BRI',
                'proof' => 'sample_proof_1.jpg',
            ]
        );

        Finance::firstOrCreate(
            ['id' => 2],
            [
                'user_id' => $admin->id,
                'aid_request_id' => null,
                'donation_id' => $donation2->id,
                'type' => 'inflow',
                'amount' => 150000.00,
                'description' => 'Penerimaan donasi dari Siti Rahmah via QRIS Nasi Darurat',
                'proof' => 'sample_proof_2.jpg',
            ]
        );

        Finance::firstOrCreate(
            ['id' => 3],
            [
                'user_id' => $admin->id,
                'aid_request_id' => $req1->id,
                'donation_id' => null,
                'type' => 'outflow',
                'amount' => 20000.00,
                'description' => 'Penyaluran bantuan makanan (Rian Pratama - Warteg Berkah)',
                'proof' => 'sample_qris_warung.jpg',
            ]
        );

        // 8. Reviews
        Review::firstOrCreate(
            ['id' => 1],
            [
                'user_id' => $penerima1->id,
                'rating' => 5,
                'comment' => 'Terima kasih banyak tim SIDAPUR dan para donatur. Bantuan makanan ini sangat berarti saat saya benar-benar tidak ada pegangan sama sekali di perantauan.',
                'is_visible' => true,
            ]
        );

        Review::firstOrCreate(
            ['id' => 2],
            [
                'user_id' => $donatur1->id,
                'rating' => 5,
                'comment' => 'Transparansi sistemnya sangat memuaskan, bukti bayar ke warung dan laporan keuangan bisa dilihat publik. Maju terus untuk gerakan kemanusiaan ini!',
                'is_visible' => true,
            ]
        );

        // 9. Partners
        Partner::firstOrCreate(
            ['email' => 'wartegberkah@gmail.com'],
            [
                'name' => 'Warteg Berkah Kampus Grendeng',
                'phone' => '081299887766',
                'proposal_details' => 'Menyediakan menu paket nasi ayam + sayur sehat khusus program Nasi Darurat Purwokerto seharga Rp 15.000 dengan sistem pembayaran QRIS langsung.',
                'status' => 'approved',
            ]
        );

        // 10. Notifications
        Notification::firstOrCreate(
            ['id' => 1],
            [
                'user_id' => $admin->id,
                'title' => 'Pengajuan Bantuan Baru',
                'message' => 'Annisa Putri telah mengajukan permohonan bantuan makanan darurat sebesar Rp 18.000.',
                'type' => 'aid_request',
                'reference_id' => $req2->id,
                'is_read' => false,
            ]
        );

        Notification::firstOrCreate(
            ['id' => 2],
            [
                'user_id' => $penerima1->id,
                'title' => 'Bantuan Telah Disalurkan',
                'message' => 'Pengajuan bantuan Anda telah disetujui dan dibayarkan ke Warteg Berkah Kampus Grendeng.',
                'type' => 'aid_request',
                'reference_id' => $req1->id,
                'is_read' => true,
            ]
        );
    }
}
