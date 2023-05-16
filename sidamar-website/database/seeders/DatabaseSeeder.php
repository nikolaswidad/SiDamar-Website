<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\BulanKas;
use App\Models\PembayaranKas;
use App\Models\ArsipFilm;
use App\Models\PostCategory;
use App\Models\EventCategory;
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

    // Author seeder end

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
            'durasi' => '120 Menit',
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
            'durasi' => '120 Menit',
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
            'durasi' => '120 Menit',
            'kategori' => 'Komedi, Drama',
            'link_film' => 'https://www.youtube.com/watch?v=QH2-TGUlwu4',
            'pernyataan' => "True",
        ]);
        
    }
}
