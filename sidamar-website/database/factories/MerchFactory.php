<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Merch>
 */
class MerchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence, //Generates a fake sentence
            'desc' => $this->faker->paragraph(30),
            'price' => $this->faker->randomNumber(5, true)
        ];
    }
}
