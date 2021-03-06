<?php

namespace App;

use App\Events\UserRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
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

    /**
     * A user only has one endpoint assigned to them.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function endpoint()
    {
        return $this->hasOne(Endpoint::class, 'user_id', 'id');
    }

    /**
     * A user has one option row.
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function options()
    {
        return $this->hasOne(UsersOption::class, 'user_id', 'id');
    }

    /**
     * Helper to check if user has PIN verification option enabled.
     * @return bool
     */
    public function isPinEnabled()
    {
        return $this->options->enable_pin ? true : false;
    }
}
