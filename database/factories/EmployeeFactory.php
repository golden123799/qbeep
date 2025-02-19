<?php

namespace Database\Factories;

use App\Models\Company;
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
			'first_name' => $this->faker->firstName,
			'last_name' => $this->faker->lastName,
			'company_id' => Company::factory(), // Create or associate with a company
			'email' => $this->faker->unique()->safeEmail,
			'phone' => $this->faker->phoneNumber,
		];
	}
}
