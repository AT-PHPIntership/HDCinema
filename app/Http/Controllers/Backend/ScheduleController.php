<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ScheduleRepositoryEloquent;
use App\Repositories\Eloquent\DayRepositoryEloquent;
use App\Repositories\Eloquent\CinemaRepositoryEloquent;
use App\Repositories\Eloquent\FilmRepositoryEloquent;
use App\Repositories\Eloquent\TimeRepositoryEloquent;
use App\Repositories\Eloquent\RoomRepositoryEloquent;

class ScheduleController extends Controller
{
    protected $scheduleRepository;
    protected $dayRepository;
    protected $cinemaRepository;
    protected $filmRepository;
    protected $timeRepository;
    protected $roomRepository;


    /**
     * Create a new authentication controller instance.
     *
     * @param FilmRepositoryEloquent     $film     the booking repository
     * @param DayRepositoryEloquent      $day      the day repository
     * @param ScheduleRepositoryEloquent $schedule the schedule repository
     * @param CinemaRepositoryEloquent   $cinema   the cinema repository
     * @param TimeRepositoryEloquent     $time     the time repository
     * @param RoomRepositoryEloquent     $room     the room repository
     *
     * @return void
     */
    public function __construct(
        FilmRepositoryEloquent $film,
        DayRepositoryEloquent $day,
        ScheduleRepositoryEloquent $schedule,
        CinemaRepositoryEloquent $cinema,
        TimeRepositoryEloquent $time,
        RoomRepositoryEloquent $room
    ) {
    
        $this->cinemaRepository = $cinema;
        $this->filmRepository = $film;
        $this->dayRepository = $day;
        $this->scheduleRepository = $schedule;
        $this->timeRepository = $time;
        $this->roomRepository = $room;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFilms= $this->scheduleRepository->with(['films','rooms'])
        ->findWhere(['cinemas_id'=>trans('lang_admin.schedule.cinema_default'), 'days_id'=>trans('lang_admin.schedule.day_default')], ['films_id','schedule','rooms_id']);
        $listDay=$this->dayRepository->lists('name', 'id');
        $listCinema=$this->cinemaRepository->lists('name', 'id');
        $info=[];
        $info['day']=$this->dayRepository->find(trans('lang_admin.schedule.day_default'), ['name']);
        $info['cinema']=$this->cinemaRepository->find(trans('lang_admin.schedule.cinema_default'), ['name']);
        return view('backend.schedules.index', compact('listDay', 'listCinema', 'listFilms', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
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
        $listFilms= $this->scheduleRepository->with(['films','rooms'])
        ->findWhere(['cinemas_id'=> $request->cinema, 'days_id'=>$request->day], ['films_id','schedule','rooms_id']);
        $listDay=$this->dayRepository->lists('name', 'id');
        $listCinema=$this->cinemaRepository->lists('name', 'id');
        $info['day']=$this->dayRepository->find($request->day, ['name']);
        $info['cinema']=$this->cinemaRepository->find($request->cinema, ['name']);
        return view('backend.schedules.index', compact('listDay', 'listCinema', 'listFilms', 'info'));
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function getRoom(Request $request)
    {
        $listRoom=$this->roomRepository->findWhere(
            ['cinemas_id'=> $request->cinema,
                                          'days_id'=> $request->day,
                                          'status' => trans('lang_admin.schedule.room_empty')],
            ['name','id']
        );
        return response()->json($listRoom);
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
