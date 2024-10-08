<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->unique()->email(),
            'phone' => fake()->unique()->phoneNumber(),
            'date_of_birth' => fake()->date(),
            'hire_date' => fake()->dateTimeBetween('-10 years', 'now'),
            'salary' => fake()->randomFloat(2, 30000, 100000), 
            'is_active' => rand(0,1),
            'department_id' => rand(1,10),
            'address' => fake()->address,
        ];
    }
}
