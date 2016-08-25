<?php

use Illuminate\Database\Seeder;

class TypeFilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('type_films')->insert([
            'name'            => '2D',
            'price'           => '50000',
            'created_at'      => Carbon\Carbon::now()
        ]);

        DB::table('type_films')->insert([
            'name'            => '3D',
            'price'           => '100000',
            'created_at'      => Carbon\Carbon::now()
        ]);
    }
}
