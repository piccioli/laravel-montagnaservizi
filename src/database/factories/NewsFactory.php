<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(6);

        return [
            'news_category_id' => NewsCategory::factory(),
            'title'            => $title,
            'slug'             => Str::slug($title),
            'excerpt'          => $this->faker->paragraph(),
            'body'             => '<p>' . implode('</p><p>', $this->faker->paragraphs(4)) . '</p>',
            'cover_image'      => null,
            'published_at'     => $this->faker->optional(0.8)->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function published(): static
    {
        return $this->state(fn () => ['published_at' => now()->subDays(rand(1, 30))]);
    }

    public function draft(): static
    {
        return $this->state(fn () => ['published_at' => null]);
    }
}
