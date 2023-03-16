<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Follow;

class ProfileController extends Controller
{
    public function index(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){
//            return $user->userFollowing()->latest()->get();
            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('Profiles.post',[ 'followings' => $user->userFollowing()->latest()->get(),'currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name,'user'=>$user]);

}
public function edit(User $user){
        return view('Profiles.edit',compact('user'));

}
public function update(User $user){
        $this->authorize('update');
        $data = request()->validate([
                'first_name'=>'required',
                'last_name' => 'required',
                'gender' => 'required',
                'date_of_birth' => 'required',
                'address' => 'required',
        ]);
        auth()->user()->update($data);
        return redirect("/profile/{$user->id}");




}
public function store(){
    $data= request()->validate([
        'profile_picture'=>['required','image'],
    ]);
    $user= Auth::user();
    $imagePath = request('profile_picture')->store('profile', 'public');

    $user->profile_picture= $imagePath;
    $user->save();
    return redirect('/profile/'.$user->id)->with('message','You have successfully changed your avatar');



}

    public function profileFollower(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){
//            return $user->followers()->latest()->get();
            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('Profiles.profile-followers',['followers' =>$user->followers()->latest()->get(),'currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name,'user'=>$user]);
    }
    public function profileFollowing(User $user){
        $currentlyFollowing = 0;

//        does the current logged-in user have a follow that matched the $user above
        if (auth()->check()){
//            return $user->userFollowing()->latest()->get();
            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('Profiles.profile-following',[ 'followings' => $user->userFollowing()->latest()->get(),'currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name,'user'=>$user]);
    }

}
