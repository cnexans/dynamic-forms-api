<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	public function run()
	{
		$faker = Faker\Factory::create();
		for ( $i = 1; $i<=3; $i++ )
		{
			App\User::Create([
				'email'      => $faker->email,
				'password'   => Hash::make("123456"),
				'membership' => 'manager'
			]);
		}
		for ( $i = 4; $i<=20; $i++ )
		{
			App\User::Create([
				'email' => $faker->email,
				'password' => Hash::make("123456"),
				'membership' => 'employee'
			]);
		}
	}
}