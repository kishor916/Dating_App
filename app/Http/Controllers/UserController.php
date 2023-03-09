<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{

    public function homefeed()
    { if (auth()->check()) {
        $user=Auth::user();
        $cards= User::inRandomOrder()->paginate(8);
        return view('Profiles.homefeed',compact('user','cards'));
    }else{
        return view('homepage');
    }


    }
    public function edit(User $user){

        return view('Profiles.edit',compact('user'));

    }
    public function showCorrectHomepage(){
        return view('homepage');
    }

    public function register(Request $request)
    {
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
    public function login(Request $request){

        $incomingFields=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (auth()->attempt($incomingFields)) {
            $request->session()->regenerate();
            return redirect('/homepagefeed')->with('success','you have sucessfully loged in');
        }else{
            return redirect('/')->with('success','login failed, no such user in the database');
        }
    }
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You are now logged out.');

    }


}
