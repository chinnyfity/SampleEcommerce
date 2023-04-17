<?php

namespace App\Http\Controllers\APIs\Auth;
use illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Cookie;
use Str;
use Carbon\Carbon;
use App\Models\User;
use DB;



class ApiLoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->middleware(function ($request, $next){
            $this->mem_id = Auth::guard('user')->id();
            return $next($request);
        });
    }


    public function login(Request $request){
        $attributes = [
            'login_email'       => 'email',
            'login_password'    => 'password',
        ];

        $rules = [
            'login_email'       => 'required|string',
            'login_password'    => 'required|string'
        ];

        $messages = [
            'required' => 'The :attribute field is required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->setAttributeNames($attributes);

        if($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->all(),
                'data' => ''
            ],200);
        }

        $user_details = User::where('email', trim($request->login_email))->orWhere('phone', trim($request->login_email))->first();

        if($user_details){
            if(Hash::check($request->login_password, $user_details->password)){

                $userData = User::find($user_details->id);
                Auth::guard('user')->login($userData, true);

                $token = $userData->createToken('authToken')->accessToken;
                $response = ['accessToken' => $token];

                return response()->json([
                    'status' => 'success',
                    'message' => 'logged in successfully',
                    'data' => [
                        'fname'     => $userData->fname,
                        'lname'     => $userData->lname,
                        'email'     => $userData->email,
                        'phone'     => $userData->phone,
                        'countrys'  => $userData->countrys,
                        'state'     => $userData->states,
                        'address'   => $userData->address,
                        'user'      => $userData->id,
                        'response'  => $response,
                    ]
                ],200);
            }
        }
        return response()->json([
            'status' => 'error',
            'message' => "Invalid details entered!",
            'data' => ''
        ],200);
    }


}
