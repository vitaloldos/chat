<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests;

use Request;
use LRedis;
use App\Http\Controllers\Controller;



class SocketController extends Controller {
    public function __construct()
    {
        $this->middleware('auth');
//        $this->middleware('guest');
    }
    public function index()
    {
        return view('socket');
    }
    public function writemessage()
    {
        return view('writemessage');
    }
    public function sendMessage(){
        $redis = LRedis::connection();
        $redis->publish('message', Request::input('message'));
    }
}

