<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\BulanKas;
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
    }
}
