<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->name(),
            'url' => fake()->url(),
            'ip_address' => fake()->ipv4(),
            'admin_name' => fake()->name(),
            'admin_email' => fake()->email(),
            'admin_password' => fake()->password(),
        ];
    }
}
