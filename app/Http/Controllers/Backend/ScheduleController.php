<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ScheduleRepositoryEloquent;
use App\Repositories\Eloquent\DayRepositoryEloquent;
use App\Repositories\Eloquent\CinemaRepositoryEloquent;
use App\Repositories\Eloquent\FilmRepositoryEloquent;

class ScheduleController extends Controller
{
    protected $scheduleRepository;
    protected $dayRepository;
    protected $cinemaRepository;
    protected $filmRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param FilmRepositoryEloquent     $film     the booking repository
     * @param DayRepositoryEloquent      $day      the day repository
     * @param ScheduleRepositoryEloquent $schedule the schedule repository
     * @param CinemaRepositoryEloquent   $cinema   the cinema repository
     *
     * @return void
     */
    public function __construct(
        FilmRepositoryEloquent $film,
        DayRepositoryEloquent $day,
        ScheduleRepositoryEloquent $schedule,
        CinemaRepositoryEloquent $cinema
    ) {
    
        $this->cinemaRepository = $cinema;
        $this->filmRepository = $film;
        $this->dayRepository = $day;
        $this->scheduleRepository = $schedule;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFilms= $this->scheduleRepository->with(['films','rooms'])
        ->findWhere(['cinemas_id'=>'1', 'days_id'=>'1'], ['films_id','schedule','rooms_id']);
        $listDay=$this->dayRepository->lists('name', 'id');
        $listCinema=$this->cinemaRepository->lists('name', 'id');
        return view('backend.schedules.index', compact('listDay', 'listCinema', 'listFilms'));
        // dd($listFilms, $listFilms[0]['films'],$listFilms[0]['rooms']);
        // dd($listFilms);
        // return response()->json($listFilms);
        // dd($listFilms);
        // dd($listFilms[0]['films']->name);
       //  $films=[];
       //  foreach ($listFilms as $key => $value) {
       //             $films[$key]['name']= $listFilms[$key]['films']['name'];
       //             $films[$key]['time']=$listFilms[$key]['times']['time'];
       //             $films[$key]['room']=$listFilms[$key]['rooms']['name'];
       //         }
       // $i=0;
       // $k=0;
       //  foreach ($films as $key => $value) {
       //      if ($key<count($films)){
       //          if($key==0){
       //              $list[$i]['name']=$films[$key]['name'];
       //              $list[$i]['time']=$films[$key]['time'];
       //              $list[$i]['room']=$films[$key]['room'];
       //          }else {
       //              if($films[$key]['name']==$films[$k]['name']){
       //              $list[$i]['time']=implode(',', [$list[$i]['time'],$films[$key]['time']]);
       //          } else{
       //              $i++;
       //              $k=$key;
       //              $list[$i]['name']=$films[$k]['name'];
       //              $list[$i]['time']=$films[$k]['time'];
       //              $list[$i]['room']=$films[$key]['room'];
       //          }
       //          }
                
       //      }
       //  }
        // dd($list);
                // $li= (object) $list;
                // if($key==0){
                //     $filmshow[$key]['name']=$films[$key]['name'];
                //     $filmshow[$key]['time']= implode(',', [' ',$films[$key]['time']]);
                // }
                // if($key>=1){
                //     if($films[$key]['name']==$films[$key-1]['name']){
                //         $filmshow[$key-1]['time']= implode(',', [$films[$key-1]['time'],$films[$key]['time']]);
                //     }
                // }
                // dd($filmshow);
                // $index= (int)($key/10);
                // if($key < $index+8){
                //     $filmshow[$index]['name']=$films[$key]['name'];
                //     $filmshow[$index]['room']=$films[$key]['room'];
                //     if($key==0){
                //         $filmshow[$index]['time']= implode(' ', [' ',$films[$key]['time']]);
                //     } else {
                //         // dd(implode(',', [$filmshow[$index]['time'],$films[$key]['time']]));
                //         // dd($filmshow[$index]);
                //         $filmshow[$index]['time']= implode(',', [$filmshow[$index]['time'],$films[$key]['time']]);
                //     }
                //     // if($key==7){
                //     // break;
                // // }
                // }
                  //
               // }
                // dd($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // dd($request->all());
        // return response()->json(Input::get('name');)
        $listFilms= $this->scheduleRepository->with(['films','rooms'])
        ->findWhere(['cinemas_id'=> $request->cinema, 'days_id'=>$request->day], ['films_id','schedule','rooms_id']);
        $listDay=$this->dayRepository->lists('name', 'id');
        $listCinema=$this->cinemaRepository->lists('name', 'id');
        return view('backend.schedules.index', compact('listDay', 'listCinema', 'listFilms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
