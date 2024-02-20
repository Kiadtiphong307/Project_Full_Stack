<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_code' =>fake()->unique()->regexify('[A-Z]{1}[0-9]{12}'),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['male','female']),
            'age' => fake()->numberBetween(1, 100),
            'birthday' => fake()->date(),
            'address' => fake()->address(),
            'job' => fake()->jobTitle(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->regexify('[0-9]{10}'),
            'customers_code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{7}'),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
