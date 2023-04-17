<?php

namespace App\Http\Controllers\Auth;
use illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:user')->except('logout');
    }

}
