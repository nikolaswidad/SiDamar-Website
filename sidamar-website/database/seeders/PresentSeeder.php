<?php

namespace Database\Seeders;

use App\Models\Present;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PresentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('present_types')->insert([
            'type' => 'Hadir'
        ]);
        DB::table('present_types')->insert([
            'type' => 'Izin'
        ]);
        DB::table('present_types')->insert([
            'type' => 'Sakit'
        ]);

        // Present::factory(100)->create();
        
    }
}
