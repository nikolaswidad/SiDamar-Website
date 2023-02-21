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
        return [
            'user_id' => mt_rand(1,4),
            'title' => $this->faker->company(),
            'category_id' => mt_rand(1,3),
            'description' => $this->faker->sentence(mt_rand(2,4)),
            'date' => $this->faker->dateTime(),
            'time' => $this->faker->time(),
            'date_notification' => $this->faker->dateTime(),
            'location' => $this->faker->streetAddress(),
            'url' => $this->faker->url(),
        ];
    }
}
