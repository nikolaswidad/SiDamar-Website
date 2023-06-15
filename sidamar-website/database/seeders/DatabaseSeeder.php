<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\BulanKas;

use App\Models\PembayaranKas;
use App\Models\ArsipFilm;
use App\Models\Certificate;
use App\Models\CertificateStatus;

use App\Models\PostCategory;
use App\Models\EventCategory;
use App\Models\finance;
use App\Models\donation;
use App\Models\Donatur;
use App\Models\Merch;
use App\Models\Customer;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(EventSeeder::class);
        $this->call(PresentSeeder::class);

    // User seeder start
        User::create([
            'name' => 'Sidamar',
            // 'username' => 'sidamar',
            'email' => 'sidamar@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => (true),
            'is_author' => (true)
        ]);

        User::factory(40)->create();
    // User seeder end

    // Author seeder start
        PostCategory::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        PostCategory::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        PostCategory::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(20)->create();

        PostCategory::factory(20)->create();

    // Author seeder end

    // Certificate seeder start
        CertificateStatus::create([
            'name' => 'Pending',
        ]);
        CertificateStatus::create([
            'name' => 'Completed',
        ]);
        CertificateStatus::create([
            'name' => 'Rejected',
        ]);

        
        // Certificate::create([
        //     'title' => 'Sidamar Berdonasi',
        //     'user_id' => '2',
        //     'status' => '2'

        // ]);
        Certificate::factory(8)->create();

    // Certificate seeder end

    // Bulan Kas seeder start
        BulanKas::create([
            'bulan' => 'Januari',
            'tahun' => '2021',
            'total_terkumpul' => 2000000,
        ]);
        BulanKas::create([
            'bulan' => 'Februari',
            'tahun' => '2021',
            'total_terkumpul' => 150000,
        ]);
        BulanKas::create([
            'bulan' => 'Maret',
            'tahun' => '2022',
            'total_terkumpul' => 100000,
        ]);
        BulanKas::create([
            'bulan' => 'April',
            'tahun' => '2022',
            'total_terkumpul' => 100000,
        ]);

        BulanKas::create([
            'bulan' => 'Mei',
            'tahun' => '2022'
        ]);
    // Bulan Kas seeder end

    //Pembayaran Kas Seeder start
        PembayaranKas::create([
            'bulan_kas_id' => 1,
            'user_id' => 1,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti1.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 2,
            'user_id' => 2,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti2.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 3,
            'user_id' => 3,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti3.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 4,
            'user_id' => 4,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti4.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 5,
            'user_id' => 5,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti5.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 1,
            'user_id' => 6,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti6.jpg',
        ]);

        PembayaranKas::create([
            'bulan_kas_id' => 2,
            'user_id' => 7,
            'jumlah' => 20000,
            'status' => 'success',
            'metode_pembayaran' => 'BCA',
            'bukti_pembayaran' => 'bukti7.jpg',
        ]);

        //Pembayaran Kas Seeder end

        //Arsip Film Seeder start
        ArsipFilm::create([
            'produser' => 'Farhan Kebab',
            'sutradara' => 'Asep Spakbor',
            'distributor' => 'Jim Salabim',
            'email' => 'filmmaker@gmail.com',
            'nomor_telepon' => '081234567890',
            'medsos' => 'instagram.com/filmaker',
            'rumah_produksi' => 'Rumah Produksi',
            'judul_film' => 'Pangarep',
            'tahun_produksi' => '2021',
            'durasi' => '120',
            'kategori' => 'Drama',
            'link_film' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
            'pernyataan' => "True"
        ]);

        ArsipFilm::create([
            'produser' => 'Sigit Rendang',
            'sutradara' => 'Reza Kecap',
            'distributor' => 'Anto Bengkel',
            'email' => 'ganool@gmail.com',
            'nomor_telepon' => '081234567890',
            'medsos' => 'instagram.com/ganool',
            'rumah_produksi' => 'Rumah Film',
            'judul_film' => 'Ketika Cinta Bertasbih',
            'tahun_produksi' => '2022',
            'durasi' => '120',
            'kategori' => 'Drama, Komedi',
            'link_film' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
            'pernyataan' => "True"
        ]);

        ArsipFilm::create([
            'produser' => 'Supri Icikiwir',
            'sutradara' => 'Zaki Indomie',
            'distributor' => 'Asep Batagor',
            'email' => 'rumahfilm@gmail.com',
            'nomor_telepon' => '081234567890',
            'medsos' => 'instagram.com/rumahfilm',
            'rumah_produksi' => 'Rumah Film',
            'judul_film' => 'Suamiku adalah Penjual Kebab',
            'tahun_produksi' => '2022',
            'durasi' => '120',
            'kategori' => 'Komedi, Drama',
            'link_film' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
            'pernyataan' => "True",
        ]);
        
    //finance seeder start
        finance::create([
            'keperluan' => 'Membayar Pajak',
            'date' => '2023-05-06',
            'cashin' => 0,
            'cashout' => 20000,
            'keterangan' => '-'
        ]);

        finance::create([
            'keperluan' => 'Uang Kas',
            'date' => '2023-05-20',
            'cashin' => 150000,
            'cashout' => 0,
            'keterangan' => 'Nitip El'
        ]);

        finance::create([
            'keperluan' => 'Iuran Tenda',
            'date' => '2023-06-20',
            'cashin' => 0,
            'cashout' => 350000,
            'keterangan' => '-'
        ]);
        //finance seeder end

        //donation seeder start

        donation::create([
            'title' => 'Berbagi Kebahagiaan Bersama Anak Yatim Piatu',
            'body' => 'Tidak semua anak mampu menghabiskan waktu spesial ini dengan keluarga inti mereka. Salah satunya adalah anak yatim. Karenanya, sangatlah penting untuk bisa berbagi kebahagiaan kepada anak yatim. SI DAMAR mengajak kalian bersama - sama untuk saling berbagi kebahagiaan dengan saudara kita. Mari berbagi kebahagiaan!!1',
            'date' => '2023-05-26',
            'image' => 'upload/donation/1684681513Berbagi bersama anak yatim piatu.jpg'
        ]);

        donation::create([
            'title' => 'Kerja Bakti Bersama SI DAMAR',
            'body' => 'Kerja bakti membersihkan lingkungan rumah biasanya dilakukan dalam lingkup rukun tetangga (RT) dan rukun warga (RW). Kerja bakti tersebut dilakukan oleh semua warga dalam lingkup RT dan RW yang bertujuan untuk mencapai lingkungan hidup yang bersih dan asri. Seluruh warga juga harus bekerja sama untuk tidak membuang sampah secara sembarangan agar kebersihan dan keasrian lingkungan terjaga.&nbsp;',
            'date' => '2023-06-10',
            'image' => 'upload/donation/1684684561Kerja Bakti.jpg'
        ]);

        //donation seeder end

        //donatur seeder start
        Donatur::create([
            'name' => 'Melani Safwa Aprila',
            'donation_id' => '3',
            'no_hp' => '+62859155035552',
            'email' => 'melanisafwa1304@gmail.com',
            'payment_type' => 'shopeepay',
            'image' => 'upload/donatur/1684686762Screenshot (721).png',
            'total' => 50000,
        ]);

        Donatur::create([
            'name' => 'Nurida Larasati',
            'donation_id' => '2',
            'no_hp' => '+62859155035552',
            'email' => 'nurida304@gmail.com',
            'payment_type' => 'bni',
            'image' => 'upload/donatur/1684686762Screenshot (721).png',
            'total' => 50000,
        ]);

        Donatur::create([
            'name' => 'Chantika',
            'donation_id' => '1',
            'no_hp' => '+62859155035552',
            'email' => 'caca1304@gmail.com',
            'payment_type' => 'bca',
            'image' => 'upload/donatur/1684686762Screenshot (721).png',
            'total' => 50000,
        ]);

        //donatur seeder end

        //merch seeder start
        Merch::create([
            'title' => 'Tote Bag',
            'desc' => 'Berbahan katun, kuat, cakep banget, cocok buat main wkwkwkwkwkwkYuk dibeli!!!',
            'price' => 50000,
            'image' => 'upload/merches/1683337693a1557-cotton-printed-tote-bag-5oz-natural.png'
        ]);

        Merch::create([
            'title' => 'Tumblr Botol Minum',
            'desc' => 'Berbahan katun, kuat, cakep banget, cocok buat main wkwkwkwkwkwkYuk dibeli!!!',
            'price' => 40000,
            'image' => 'upload/merches/1683337722cf5f016652a4444fe41cd39ecf17a01f.jpg'
        ]);

        Merch::create([
            'title' => 'Kaos Sidamar',
            'desc' => 'Berbahan katun, kuat, cakep banget, cocok buat main wkwkwkwkwkwkYuk dibeli!!!',
            'price' => 75000,
            'image' => 'upload/merches/1683337748Kaos-Polos.jpg'
        ]);
        //merch seeder end

        //customer seeder start

        Customer::create([
            'name' => 'Chantika',
            'merch_id' => '1',
            'no_hp' => '+62859155035552',
            'email' => 'caca1304@gmail.com',
            'payment_type' => 'bca',
            'address' => 'Semarang',
            'image' => 'upload/customer/1684956543Screenshot (770).png',
            'total' => 50000,
        ]);

        Customer::create([
            'name' => 'Seo Changbin',
            'merch_id' => '3',
            'no_hp' => '+62859155035552',
            'email' => 'caca1304@gmail.com',
            'payment_type' => 'shopeepay',
            'address' => 'Semarang',
            'image' => 'upload/customer/1685972802WhatsApp Image 2023-06-02 at 8.25.34 PM.jpeg',
            'total' => 50000,
        ]);

        Customer::create([
            'name' => 'Melani Safwa Aprila',
            'merch_id' => '2',
            'no_hp' => '+62859155035552',
            'email' => 'caca1304@gmail.com',
            'payment_type' => 'shopeepay',
            'address' => 'Semarang',
            'image' => 'upload/customer/1685972802WhatsApp Image 2023-06-02 at 8.25.34 PM.jpeg',
            'total' => 50000,
        ]);

    //customer seeder start
    }
}
