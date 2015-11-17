<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    //after registration redirect
    protected $redirectPath = '/';

    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
//    public function __construct(Request $request)
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'admin' => 'required|boolean',
            'user' => 'required|boolean',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'color' => 'required|max:20',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'admin' => $data['admin'],
            'user' => $data ['user'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'color' => $data['color'],
        ]);
    }


    public function postLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        if (Auth::attempt(['username' => 'admin', 'password' => $password]))
        {
            return redirect()->intended('admin');
        }elseif (Auth::attempt(['username' => $username, 'password' => $password])){
            return redirect()->intended('userchat');
        }else{
            return redirect()->intended('auth/register/');
        }


    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

}
