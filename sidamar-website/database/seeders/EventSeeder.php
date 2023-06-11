<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(10)->create();

        // EventCategory::create([
        //     'name' => 'Event'
        // ]);
        // EventCategory::create([
        //     'name' => 'Production'
        // ]);
        // EventCategory::create([
        //     'name' => 'Donation'
        // ]);
    }
}
