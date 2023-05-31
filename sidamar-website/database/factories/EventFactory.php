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
        $categories = ['Event', 'Production', 'Donation'];

        return [
            'user_id' => mt_rand(1,4),
            'title' => $this->faker->word(),
            'event_manager' => fake()->name(),
            'category' => $this->faker->randomElement($categories),
            'description' => $this->faker->paragraphs(5, true),
            'date' => $this->faker->dateTime(),
            'time' => $this->faker->time(),
            'date_notification' => $this->faker->dateTime(),
            'location' => $this->faker->streetAddress(),
            'url' => $this->faker->url(),
        ];
    }
}
