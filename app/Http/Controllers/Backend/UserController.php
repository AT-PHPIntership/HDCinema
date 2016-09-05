<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Models\User;
use Exception;
use Session;
use Auth;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->userRepository = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listUsers=$this->userRepository->all();
        return view('backend.users.index', compact('listUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\UserRequest $request User request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['admins_id'] = Auth::guard('admin')->user()->id;
        $img = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imagename=time().'_'.$data['username'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imagename;
            $img->move(public_path(config('path.upload_book')), $imagename);
        }
        $data['password'] = bcrypt($request->password);
        $data['block'] = trans('lang_admin.user.block_default');
        $result=$this->userRepository->create($data);
        if ($result) {
            Session::flash('success', trans('lang_admin.user.create_success'));
            return redirect()->route('admin.user.index');
        } else {
             Session::flash('danger', trans('lang_admin.user.create_error'));
            return redirect()->route('admin.user.create');
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
            $users = $this->userRepository->find($id);
            return  view('backend.users.edit', compact('users'));
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.user.no_user'));
            return redirect() -> route('admin.user.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request\UserEditRequest $request request
     * @param int                                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $data = $request -> all();
        if ($request -> hasFile('image')) {
            $img = $request->file('image');
            $imgname = time() . '_'.$data['fullname'] .'.'. $img->getClientOriginalExtension();
            $data['image'] = $imgname;
            $img->move(public_path(config('path.upload_user')), $imgname);
        }
        try {
            $users = $this->userRepository->find($id);
            if (!empty($users)) {
                $this->userRepository->update($data, $id);
                Session::flash('success', trans('lang_admin.user.edit_success'));
                return redirect() -> route('admin.user.index');
            }
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.user.edit_fail'));
            return redirect() -> route('admin.user.index');
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
