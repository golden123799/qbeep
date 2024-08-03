<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Seed Company and each company has at least 3 employees
		Company::factory()->count(50)->hasEmployees(3)->create();
	}
}
