<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
//    public function homefeed(){
//
//            return view('homepage');
//        }


    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homefeed');
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
            return redirect('/')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/')->with('failure', 'Invalid login.');
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

        $user = User::create($incomingFields);
        auth()->login($user);

       return redirect('/')->with('success','done');

    }
    public function profile(){
        return view('profile');
    }

    public function logout(){

        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');

    }

}
