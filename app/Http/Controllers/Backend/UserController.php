<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Repositories\Eloquent\BookingRepositoryEloquent;
use App\Models\User;
use Exception;
use Session;
use Auth;

class UserController extends Controller
{
    protected $userRepository;
    protected $bookingRepository;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent    $user    the user repository
     * @param BookingRepositoryEloquent $booking the booking repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user, BookingRepositoryEloquent $booking)
    {
        $this->userRepository = $user;
        $this->bookingRepository = $booking;
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
            $img->move(public_path(config('path.upload_user')), $imagename);
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
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->userRepository->find($id);
            $bookings= $this->bookingRepository->findByField('users_id', $id, ['id'])->count();
            if ($bookings== trans('lang_admin.user.booking_empty')) {
                $result = $this->userRepository->delete($id);
                if ($result) {
                    Session::flash('success', trans('lang_admin.user.delete_success'));
                } else {
                    Session::flash('danger', trans('lang_admin.user.delete_fail'));
                }
            } else {
                Session::flash('danger', trans('lang_admin.user.user_has_booking'));
            }
            return redirect() -> route('admin.user.index');
        } catch (Exception $ex) {
            Session::flash('danger', trans('lang_admin.user.no_user'));
            return redirect() -> route('admin.user.index');
        }
    }
}
