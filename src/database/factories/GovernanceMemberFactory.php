<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GovernanceMemberFactory extends Factory
{
    public function definition(): array
    {
        $roles = ['Presidente', 'Vice Presidente', 'Consigliere', 'Revisore dei Conti'];

        return [
            'name'         => $this->faker->name(),
            'role'         => $this->faker->randomElement($roles),
            'bio'          => $this->faker->optional()->paragraph(),
            'photo'        => null,
            'mandate_info' => 'Triennio ' . date('Y') . '–' . (date('Y') + 3),
            'sort_order'   => $this->faker->numberBetween(1, 10),
            'is_active'    => true,
        ];
    }
}
