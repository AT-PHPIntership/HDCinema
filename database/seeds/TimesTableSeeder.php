<?php

use Illuminate\Database\Seeder;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	DB::table('times')->insert([
    		'time'             => '08:30:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '10:00:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '12:15:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '14:30:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '16:00:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '18:20:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '20:20:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('times')->insert([
    		'time'             => '21:45:00',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    }
}
