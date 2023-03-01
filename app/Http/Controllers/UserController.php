<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homepage-feed');
        }else{
            return view('homepage');
        }
    }

    public function login(Request $request){
        $incomingfields=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
       
        if (auth()->attempt(['email' => $incomingfields['email'],'password'=>$incomingfields['password']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success','you have sucessfully loged in');
        }else{
            return redirect('/')->with('success','login failed, no such user in the database');
        }
    }

    public function register(Request $request){
        $incomingFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:13'],
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7'],
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required'
        ]);
        $incomingFields['password'] = password_hash($incomingFields['password'], PASSWORD_BCRYPT);

        User::create($incomingFields);
        return 'file has been registered';

    }
}
