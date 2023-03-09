<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(User $user){

        return view('Profiles.profilePage',compact('user',));

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

}
