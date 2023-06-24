<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $categories = ['Event', 'Production', 'Donation'];

        return [
            'user_id' => mt_rand(1,4),
            'title' => $this->faker->word(),
            'event_manager' => fake()->name(),
            // 'category' => $this->faker->randomElement($categories),
            'category' =>  mt_rand(1,3),
            'description' => $this->faker->paragraphs(5, true),
            'date' => $this->faker->dateTime(),
            'time' => $this->faker->time(),
            'location' => $this->faker->streetAddress(),
            'url' => $this->faker->url(),
        ];

        // return[
        //     'user_id' => mt_rand(1,4),
        //     'title' => $this->faker->unique()->randomElement(['Layar Tancap', 'Screening Film', 'Diskusi Film', 'Workshop', 'Membaca Skenario', 'Kunjungan ke Lokasi Syuting', 'Seminar atau Talkshow', 'Pemutaran Film Klasik']),
        //     'description' => $this->faker->paragraph,
        //     'category' =>  mt_rand(1,1),
        //     'date' => $this->faker->date(),
        //     'time' => $this->faker->time(),
        //     'location' => $this->faker->address,
        //     'url' => $this->faker->url,
        // ];

        $fakeData = [
            [
                'title' => 'Layar Tancap',
                'category' => 1,
                'description' => 'Nikmati menonton film di bawah langit malam! Acara layar tancap diadakan untuk memberikan pengalaman unik dalam menonton film di lokasi terbuka.',
                'date' => '2023-06-30',
                'time' => '19:00',
                'location' => 'Taman ABC',
                'url' => 'https://contohurl.com/layartancap'
            ],
            [
                'title' => 'Screening Film',
                'category' => 1,
                'description' => 'Bergabunglah dalam acara screening film komunitas kami! Film-film pilihan akan ditayangkan untuk dinikmati bersama dengan anggota komunitas film yang lain.',
                'date' => '2023-07-05',
                'time' => '18:30',
                'location' => 'Gedung XYZ',
                'url' => 'https://contohurl.com/screeningfilm'
            ],
            [
                'title' => 'Diskusi Film',
                'category' => 1,
                'description' => 'Setelah menonton film, mari bergabung dalam diskusi film yang akan membahas berbagai aspek dari film yang ditampilkan. Mari berbagi pendapat dan pemahaman kita!',
                'date' => '2023-07-10',
                'time' => '20:00',
                'location' => 'Ruang Diskusi ABC',
                'url' => 'https://contohurl.com/diskusifilm'
            ],
            [
                'title' => 'Workshop',
                'category' => 1,
                'description' => 'Dapatkan kesempatan untuk belajar dan memperluas pengetahuan Anda tentang pembuatan film melalui workshop yang kami selenggarakan. Tunggu kehadiran Anda!',
                'date' => '2023-07-15',
                'time' => '14:00',
                'location' => 'Studio XYZ',
                'url' => 'https://contohurl.com/workshop'
            ],
            [
                'title' => 'Membaca Skenario',
                'category' => 1,
                'description' => 'Bergabunglah dalam acara membaca skenario untuk melatih kemampuan akting dan memahami proses pembuatan film dari perspektif skenario. Siapkan bakat akting Anda!',
                'date' => '2023-07-20',
                'time' => '19:30',
                'location' => 'Ruang Teater ABC',
                'url' => 'https://contohurl.com/membacaskenario'
            ],
            [
                'title' => 'Kunjungan ke Lokasi Syuting',
                'category' => 1,
                'description' => 'Dapatkan kesempatan langka untuk mengunjungi lokasi syuting film terkenal di kota ini. Lihatlah bagaimana film dibuat dari dekat dan rasakan suasana di balik layar.',
                'date' => '2023-07-25',
                'time' => '10:00',
                'location' => 'Lokasi Syuting XYZ',
                'url' => 'https://contohurl.com/kunjungansyuting'
            ],
            [
                'title' => 'Seminar atau Talkshow',
                'category' => 1,
                'description' => 'Saksikanlah seminar atau talkshow dengan pembicara terkenal di industri film. Dapatkan wawasan dan inspirasi baru tentang perfilman dalam acara yang menarik ini.',
                'date' => '2023-07-30',
                'time' => '15:30',
                'location' => 'Aula ABC',
                'url' => 'https://contohurl.com/seminartalkshow'
            ],
            [
                'title' => 'Pemutaran Film Klasik',
                'category' => 1,
                'description' => 'Mari kita berjalan melalui memori film dengan memutar film-film klasik yang telah menjadi ikon dalam sejarah perfilman. Dapatkan pengalaman nostalgia yang tak terlupakan.',
                'date' => '2023-08-05',
                'time' => '20:00',
                'location' => 'Teater XYZ',
                'url' => 'https://contohurl.com/filmklasik'
            ]
        ];



    }
}
