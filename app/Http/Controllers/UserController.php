<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Request;
use Auth;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//dd(Auth::check());
        if  (Auth::check()) {
            $data['username'] = Auth::user()->username;
            $data['color'] = Auth::user()->color;
            $data['date'] = date('H:i', time());
            if (Auth::user()->ban == '0')
                return view('userchat', $data);
            else
                return redirect()->intended('ban');
        }else {
            return redirect()->intended('auth/login');
        }
    }

    public function admin()
    {

         if (Auth::user()->admin === '1') {
            $data['username'] = Auth::user()->username;
            $data['color'] = Auth::user()->color;
            $data['date'] = date('H:i', time());
            $users = DB::table('users')->get();
            foreach ($users as $key => $user){
                if ($user->ban == '1') {
                    unset($users[$key]);
                }
                if ($user->username == 'admin') {
                    unset($users[$key]);
                }
            }
            $data['users'] = $users;
            return view('admin', $data);
        }else {
            return redirect()->intended('auth/login');
        }
    }


    public function banUser() {
        if (Request::input('userid')) {
            DB::table('users')
                ->where('id', Request::input('userid'))
                ->update(['ban' => Request::input('bannumber')]);
            $response = array(
                'status' => 'success',
                'msg' => 'User Ban Successfully!',
            );
        } else {
            $response = array(
                'status' => 'error',
                'msg' => 'User Ban Error!',
            );
        }
        return  $response ;
    }

    public function viewBan() {
        return view('ban');
    }

}
