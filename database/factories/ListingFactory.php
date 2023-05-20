<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' =>$this->faker->jobTitle(),
            'tags' => 'laravel, API',
            'description' => $this->faker->paragraph(),
            'email' => $this->faker->companyEmail(),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'website' => $this->faker->url()
        ];
    }
}
