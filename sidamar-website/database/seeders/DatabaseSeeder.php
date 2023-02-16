<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\BulanKas;
use App\Models\PostCategory;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        DB::table('present_type')->insert([
            'type' => 'Hadir'
        ]);
        DB::table('present_type')->insert([
            'type' => 'Izin'
        ]);
        DB::table('present_type')->insert([
            'type' => 'Sakit'
        ]);
        DB::table('present_type')->insert([
            'type' => 'Tidak Hadir'
        ]);

        Event::factory(10)->create();

        EventCategory::create([
            'type' => 'Event'
        ]);
        EventCategory::create([
            'type' => 'Production'
        ]);
        EventCategory::create([
            'type' => 'Donation'
        ]);

        

    // User seeder start
        User  ::create([
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
    // Bulan Kas seeder end
    }
}
