<?php

namespace App;

use App\Events\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dispatchesEvents = [
        /*
         * Refer to UserRegistered Event for initializations and actions
         * to be performed whenever someone register an account
         * (i.e a user is created)
         * */
        'created' => UserRegistered::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function options()
    {
        return $this->hasOne(UsersOption::class, 'user_id', 'id');
    }

    public function isPinEnabled()
    {
        return $this->options()->first()->enable_pin ? true : false;
    }
}
