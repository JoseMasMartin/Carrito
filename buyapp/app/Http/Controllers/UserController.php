<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $usrs = User::all();
        return view('users.index',[
        'users'=>$usrs
    ]);

    }

}
