<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // this is register user
    public function register()
    {
        $data = Validator::make(\request()->post(), [
            'email' => 'required|min:11|email:rfc,dns,filter',
            'password' => 'required|min:8',
            'user_agent' => 'required'
        ]);
        if ($data->fails()) echo Response::json($data->errors()->all(), 500); // set error
        $ip = \request()->ip(); // get ip user
        $register = User::register($data->validated(), $ip); // user register
        echo ($register) ? Response::json('successful register') : Response::json('unSuccessful register', 500); // set response
    }
    // this is login user
    public function login()
    {
        $data = Validator::make(\request()->post(), [
            'email' => 'required|min:11|email:rfc,dns,filter',
            'password' => 'required|min:8'
        ]);
        if ($data->fails()) echo Response::json($data->errors()->all(), 500); // set error
        $login = Auth::attempt($data->validated()); // check user data
        echo ($login) ? Response::json('successful login') : Response::json('wrong is user data', 500); // set response
    }
}
