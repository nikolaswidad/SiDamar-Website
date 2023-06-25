<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Present>
 */
class PresentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $type = ['hadir', 'sakit', 'izin'];

        return [
            'event_id' => $this->faker->numberBetween(1, 10),
            'user_id' => mt_rand(1,41),
            'type' => $this->faker->randomElement($type),

        ];
    }
}
