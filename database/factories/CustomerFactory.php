<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement([
            'schoolboy',
            'student',
            'adult'
        ]);

        return [
            'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'type' => $type,
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode()
        ];
    }
}
