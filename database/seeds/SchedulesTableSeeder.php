<?php

use Illuminate\Database\Seeder;
use App\Room;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $scheduleList=array('08:30:00', '10:00:00', '12:15:00', '14:30:00',
             '16:00:00', '18:20:00', '20:20:00','21:45:00');

        for($i = 1; $i <= 10; $i++){
            $rooms= Room::where('cinemas_id', $i)->get();
            $rooms_id= array();
            for($k=0; $k<count($rooms); $k++){
                array_push($rooms_id, $rooms[$k]['id']);
            }
            for($j=0;$j< 10;$j++){
                for($k=1; $k<=3; $k++){
                    // for($l=1; $l<=8; $l++){
                        $schedule=$faker->randomElements($array = $scheduleList, $count = rand(1,8));
                        $schedule=implode(' , ', $schedule);
                        DB::table('schedules')->insert([
                            'cinemas_id'          => $i,
                            'films_id'            => ($j+1),
                            'days_id'             => $k,
                            'schedule'            => $schedule,
                            'rooms_id'            => $rooms_id[$j],
                            'created_at'         => Carbon\Carbon::now()
                        ]);
                    // }
                     
                }
                
            }
            
        }
    }
}
