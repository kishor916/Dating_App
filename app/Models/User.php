<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    //here we are defining relationship between user and follow
    //whoever follows the user
    public function followers(){
        return $this->hasMany(Follow::class, 'followinguser');
    }

    public function userFollowing(){
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function sentMessages(){
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(){
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function sendMessage(User $receiver, $message)
    {
        if ($this->userFollowing($receiver) && $receiver->userFollowing($this)) {
            $this->sentMessages()->create([
                'recipient_id' => $receiver->id,
                'message' => $message,
            ]);
        }
    }
    //only checks if the sender follows the recipeint or not
//    public function sendMessage(User $recipient, $message)
//    {
//        if ($this->follows($recipient)) {
//            $this->sentMessages()->create([
//                'recipient_id' => $recipient->id,
//                'message' => $message,
//            ]);
//        }
//
//
//    }
}
