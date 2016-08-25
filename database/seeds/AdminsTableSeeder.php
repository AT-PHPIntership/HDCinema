<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i < 10; $i++){
        	DB::table('admins')->insert([
        		'username'        => $faker-> username,
        		'password'        => bcrypt('123456'),
        		'fullname'        => $faker-> name,
        		'created_at'      => Carbon\Carbon::now()
        	]);
        }
    }
}
