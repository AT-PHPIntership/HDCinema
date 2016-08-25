<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $status=array('Phòng trống', 'Phòng bận', 'Phòng đang sửa chữa');
        for($i = 1; $i <= 10; $i++){
            for($j=1; $j<=10; $j++){
                DB::table('rooms')->insert([
                    'name'               => 'Room'.$j,
                    'status'             => $faker-> randomElement($array = $status),
                    'cinemas_id'         => $i,
                    'created_at'         => Carbon\Carbon::now()
                ]); 
            }
            
        }
    }
}
