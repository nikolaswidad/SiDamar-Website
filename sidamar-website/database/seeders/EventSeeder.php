<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
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
        // Event::factory(10)->create();

        $times = [
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '18:00',
            '19:00',
            // Add more time values as needed

        ];

        $randomTime = $times[array_rand($times)];

        // $dates = [];
        // $startDate = strtotime('2023-06-30');
        // for ($i = 0; $i < 10; $i++) {
        //     $randomDate = date('Y-m-d', mt_rand($startDate, strtotime('+10 days', $startDate)));
        //     $dates[] = $randomDate;
        // }
        

        Event::factory()->create([
            'title' => 'Layar Tancap',
            'description' => 'Nikmati menonton film di bawah langit malam! Acara layar tancap diadakan untuk memberikan pengalaman unik dalam menonton film di lokasi terbuka.',
            'category_id' => '1',
            'date' => '2023-06-30',
            'time' => '18:00',
            'location' => 'Lapangan Sentyaki',
            'url' => 'https://goo.gl/maps/3V8FfDmr5S1aMPcu8'
        ]);

        Event::factory()->create([
            'title' => 'Screening Film',
            'description' => 'Bergabunglah dalam acara screening film komunitas kami! Film-film pilihan akan ditayangkan untuk dinikmati bersama dengan anggota komunitas film yang lain.',
            'category_id' => '1',
            'date' => '2023-07-07',
            'time' => '19:00',
            'location' => 'Basecamp',
            'url' => 'https://goo.gl/maps/GctTh9wyM1g5BsQz9'
        ]);

        Event::factory()->create([
            'title' => 'Diskusi Film',
            'description' => 'Setelah menonton film, mari bergabung dalam diskusi film yang akan membahas berbagai aspek dari film yang ditampilkan. Mari berbagi pendapat dan pemahaman kita!',
            'category_id' => '1',
            'date' => '2023-07-15',
            'time' => '13:00',
            'location' => 'Basecamp',
            'url' => 'https://goo.gl/maps/GctTh9wyM1g5BsQz9'
        ]);

        Event::factory()->create([
            'title' => 'Workshop',
            'description' => 'Dapatkan kesempatan untuk belajar dan memperluas pengetahuan Anda tentang pembuatan film melalui workshop yang kami selenggarakan. Tunggu kehadiran Anda!',
            'category_id' => '1',
            'date' => '2023-07-29',
            'time' => '10:00',
            'location' => 'Gedung Oudetrep',
            'url' => 'https://goo.gl/maps/uQpR6JMLkNhi1NNq9'
        ]);

        Event::factory()->create([
            'title' => 'Membaca Skenario',
            'description' => 'Bergabunglah dalam acara membaca skenario untuk melatih kemampuan akting dan memahami proses pembuatan film dari perspektif skenario. Siapkan bakat akting Anda!',
            'category_id' => '1',
            'date' => '2023-07-29',
            'time' => '13:00',
            'location' => 'Gedung Oudetrep',
            'url' => 'https://goo.gl/maps/uQpR6JMLkNhi1NNq9'
        ]);

        Event::factory()->create([
            'title' => 'Syuting Iklan',
            'description' => 'Dapatkan kesempatan langka untuk mengunjungi lokasi syuting film terkenal di kota ini. Lihatlah bagaimana film dibuat dari dekat dan rasakan suasana di balik layar.',
            'category_id' => '2',
            'date' => '2023-09-02',
            'time' => '06:00',
            'location' => 'Bukit Diponegoro Hillside Park',
            'url' => 'https://goo.gl/maps/Depp54Yeu9Fw8MUA6'
        ]);

        Event::factory()->create([
            'title' => 'Seminar atau Talkshow',
            'description' => 'Saksikanlah seminar atau talkshow dengan pembicara terkenal di industri film. Dapatkan wawasan dan inspirasi baru tentang perfilman dalam acara yang menarik ini.',
            'category_id' => '1',
            'date' => '2023-08-12',
            'time' => '10:00',
            'location' => 'Gedung Oudetrep',
            'url' => 'https://goo.gl/maps/uQpR6JMLkNhi1NNq9'
        ]);

        Event::factory()->create([
            'title' => 'Pemutaran Film Klasik',
            'description' => 'Mari kita berjalan melalui memori film dengan memutar film-film klasik yang telah menjadi ikon dalam sejarah perfilman. Dapatkan pengalaman nostalgia yang tak terlupakan.',
            'category_id' => '1',
            'date' => '2023-08-27',
            'time' => '19:00',
            'location' => 'Basecamp',
            'url' => 'https://goo.gl/maps/GctTh9wyM1g5BsQz9'
        ]);

        EventCategory::create([
            'category' => 'Acara'
        ]);
        EventCategory::create([
            'category' => 'Produksi'
        ]);
        EventCategory::create([
            'category' => 'Donasi'
        ]);
    }
}
