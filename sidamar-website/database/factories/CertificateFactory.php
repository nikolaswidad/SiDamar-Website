<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'title' => $this->faker->sentence(mt_rand(1,2)),
            'event_id' => mt_rand(1,10),
            'user_id' => mt_rand(1,4),
            'status' => mt_rand(1,2)
        ];
    }
}
