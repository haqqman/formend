<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
    /**
     * @var array
     */
    protected $guarded = [
        'is_active'
    ];

    /**
     * An endpoint belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An Endpoint can have as much domain as possible
     * (No limit yet or subscription)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function domains()
    {
        return $this->hasMany(Domain::class);
    }
}
