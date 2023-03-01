<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homepage(){
        return view('homepage');
    }

    public function homefeed($user){
        $user=User::find($user);
        return view('homefeed',compact('user'));
    }
}
