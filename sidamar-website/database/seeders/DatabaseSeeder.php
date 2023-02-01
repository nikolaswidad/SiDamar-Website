<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\PostCategory;
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

        // Event::factory(10)->create();

        EventCategory::create([
            'name' => 'Event'
        ]);
        EventCategory::create([
            'name' => 'Production'
        ]);
        EventCategory::create([
            'name' => 'Donation'
        ]);

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
    }
}
