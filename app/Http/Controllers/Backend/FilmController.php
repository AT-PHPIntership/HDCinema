<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\FilmEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\CategoryRepositoryEloquent;
use App\Repositories\Eloquent\FilmRepositoryEloquent;
use App\Repositories\Eloquent\TypeFilmRepositoryEloquent;
use Exception;
use Session;
use Auth;

class FilmController extends Controller
{
    protected $categoryRepository;
    protected $filmRepository;
    protected $typeFilmRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param CategoryRepositoryEloquent $category the category repository
     * @param FilmRepositoryEloquent     $film     the booking repository
     * @param TypeFilmRepositoryEloquent $typeFilm the typeFilm repository
     *
     * @return void
     */
    public function __construct(
        CategoryRepositoryEloquent $category,
        FilmRepositoryEloquent $film,
        TypeFilmRepositoryEloquent $typeFilm
    ) {
    
        $this->categoryRepository = $category;
        $this->filmRepository = $film;
        $this->typeFilmRepository = $typeFilm;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFilms=$this->filmRepository->all();
        return view('backend.films.index', compact('listFilms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->lists('name', 'id');
        $typeFilms= $this->typeFilmRepository->lists('name', 'id');
        return view('backend.films.create', compact('categories', 'typeFilms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\FilmRequest $request Film request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        $data = $request->all();
        $data['admins_id'] = Auth::guard('admin')->user()->id;
        $img = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time().'_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.upload_film')), $imagename);
        }
        $result=$this->filmRepository->create($data);
        if ($result) {
            Session::flash('success', trans('lang_admin.film.create_success'));
            return redirect()->route('admin.film.index');
        } else {
             Session::flash('danger', trans('lang_admin.film.create_error'));
            return redirect()->route('admin.film.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $film = $this->filmRepository->find($id);
            $categories = $this->categoryRepository->lists('name', 'id');
            $typeFilms= $this->typeFilmRepository->lists('name', 'id');
            return  view('backend.films.edit', compact('film', 'categories', 'typeFilms'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.film.no_film'));
            return redirect() -> route('admin.film.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request\FilmEditRequest $request request
     * @param int                                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(FilmEditRequest $request, $id)
    {
        $data = $request -> all();
        // dd($data);
        if ($request -> hasFile('image')) {
            $img = $request->file('image');
            $imgname = time() . '_'.$data['name'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imgname;
            $img->move(public_path(config('path.upload_film')), $imgname);
        }
        try {
            $this->filmRepository->find($id);
            $result= $this->filmRepository->update($data, $id);
            if ($result) {
                Session::flash('success', trans('lang_admin.film.edit_success'));
                return redirect() -> route('admin.film.index');
            } else {
                Session::flash('danger', trans('lang_admin.film.edit_fail'));
                return redirect() -> route('admin.film.index');
            }
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.film.no_film'));
            return redirect() -> route('admin.film.index');
        }
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
