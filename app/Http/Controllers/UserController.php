<?php

namespace App\Http\Controllers;

use App\Models\Follow;
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
   /* public function edit(User $user){

        return view('Profiles.edit',compact('user'));

    }*/
    public function showCorrectHomepage(){
        return view('homepage');
    }

    public function login(Request $request){

        $incomingfields=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (auth()->attempt(['email' => $incomingfields['email'],'password'=>$incomingfields['password']])) {
            $request->session()->regenerate();
            return redirect('/homepagefeed')->with('success', 'You have successfully logged in.');
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

        return 'file has been registered';
    }
    /*public function login(Request $request){

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
    }*/
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You are now logged out.');

    }
    public function profile(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){

            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('',['currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }

    public function profileFollower(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){
//            return $user->followers()->latest()->get();
            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('profile-followers',['followers' =>$user->followers()->latest()->get(),'currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }
    public function profileFollowing(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){
//            return $user->userFollowing()->latest()->get();
            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('profile-following',[ 'followings' => $user->userFollowing()->latest()->get(),'currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }
}
