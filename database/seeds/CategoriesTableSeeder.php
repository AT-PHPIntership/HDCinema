<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	DB::table('categories')->insert([
    		'name'             => 'Đang chiếu',
    		'created_at'       => Carbon\Carbon::now()
    	]);

    	DB::table('categories')->insert([
    		'name'             => 'Sắp chiếu',
    		'created_at'       => Carbon\Carbon::now()
    	]);
    }
}
