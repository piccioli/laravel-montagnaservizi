<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'       => $this->faker->name(),
            'role'       => $this->faker->jobTitle(),
            'bio'        => $this->faker->paragraph(),
            'photo'      => null,
            'sort_order' => $this->faker->numberBetween(1, 20),
            'is_active'  => true,
        ];
    }
}
