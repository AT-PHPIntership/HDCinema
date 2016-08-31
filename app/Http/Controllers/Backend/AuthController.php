<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\AuthController as Auth;

class AuthController extends Auth
{
    protected $guard = 'admin';
    protected $loginView = 'backend/auth/login';
    protected $redirectTo = '/admin';
    protected $redirectAfterLogout = 'admin/login';
}
