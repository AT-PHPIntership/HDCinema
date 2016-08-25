<?php

use Illuminate\Database\Seeder;
use App\Room;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $status=array('Ghế trống', 'Ghế đã đặt', 'Ghế hỏng');
        $character= array('A','B','C','D','E','F','H','I');
        $seats=array();
        for($k=0; $k<count($character);$k++){
        	for($j=1;$j<=10;$j++){
        		array_push($seats, $character[$k].$j );
        	}
        }
        for($i = 1; $i <= 10; $i++){
            $rooms= Room::where('cinemas_id', $i)->get();
            $rooms_id= array();
            for($k=0; $k<count($rooms); $k++){
                array_push($rooms_id, $rooms[$k]['id']);
            }
            for($j=0; $j<10; $j++){
                for($h=0; $h<count($seats);$h++){
                    DB::table('seats')->insert([
                        'name'               => $seats[$h],
                        'status'            => $faker-> randomElement($array = $status),
                        'rooms_id'          => $rooms_id[$j],
                        'created_at'         => Carbon\Carbon::now()
                    ]);
                }
            }
        	
            
        }
    }
}
