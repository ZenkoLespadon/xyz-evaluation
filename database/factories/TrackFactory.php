<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use App\Models\Week;
use Database\Samples\TrackSamples;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrackFactory extends Factory
{
    public function definition(): array
    {
        // Between yesterday and ~6 previous weeks
        $published_at = now()->subDays(rand(1, 80));

        return [
            'user_id' => User::factory(),
            'week_id' => Week::factory(),
            'artist' => fake()->name(),
            'title' => fake()->sentence(2),
            'url' => fake()->randomElement(['https://youtube.com/watch?v=ID', 'https://soundcloud/USER/TRACK']),
            'created_at' => $published_at,
            'updated_at' => $published_at,
            'category_id' => Category::all()->random()->id,
        ];
    }

    public function sample()
    {
        return $this->state(function (array $attributes) {
            return app(TrackSamples::class)->collect()->random();
        });
    }
}
