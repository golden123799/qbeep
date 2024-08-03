<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		// User::factory(10)->create();

		User::factory()->create([
			'name' => 'Admin',
			'email' => 'admin@admin.com',
			'password' => Hash::make('password'),
		]);

		// Generate token for API testing
		$user = User::find(1);
		$token = $user->createToken('API Token Name')->plainTextToken;
		echo "Your API token for testing: $token";

		// Example to test api
		// curl -X GET "http://your-laravel-app.test/api/companies/1" \
		// 	-H "Authorization: Bearer YOUR_TOKEN_HERE"
	}
}
