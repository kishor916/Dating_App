<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'address',
        'latitude',
        'longitude'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
    //here we are defining relationship between user and follow
    //whoever follows the user
    public function followers(){
        return $this->hasMany(Follow::class, 'followinguser');
    }

    public function userFollowing(){
        return $this->hasMany(Follow::class, 'user_id');
    }
    public function profileImage(){
        $imagePath=($this->profile_picture) ? $this->profile_picture : 'profile/rFgRcY72UoDwxKBtjKN4gaVGBxiyj4nhx9h0HclO.png';
        return  '/storage/'.$imagePath;

    }

}
