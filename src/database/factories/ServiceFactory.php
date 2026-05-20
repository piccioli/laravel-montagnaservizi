<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            'segreteria-operativa',
            'comunicazione',
            'contabilita-veryfico',
            'consulenze',
            'fundraising',
        ];

        $title = $this->faker->sentence(3);

        return [
            'category_slug' => $this->faker->randomElement($categories),
            'slug'          => Str::slug($title),
            'title'         => $title,
            'subtitle'      => $this->faker->sentence(),
            'description'   => $this->faker->paragraph(),
            'body'          => '<p>' . implode('</p><p>', $this->faker->paragraphs(3)) . '</p>',
            'sort_order'    => $this->faker->numberBetween(1, 10),
        ];
    }
}
