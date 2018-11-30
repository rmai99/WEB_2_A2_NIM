<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker\Factory::create();//import library faker;
		
		$limit = 5; //batasan berapa banyak data
		
		for($i = 0;$i < $limit; $i++){
			DB::table('member')->insert([
				'name' => $faker->name,
				'email' => $faker->unique()->email,//email unique sehingga tidak ada yang sama
				'password' => $faker->password,
				'macAddress' => $faker->macAddress,
			]);
		}
    }
}
