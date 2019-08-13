<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    /**
     * Mass assignment protected fields.
     *
     * @var array
     */
    protected $guarded = [
        'is_active',
    ];


    /**
     * A domain is valid only for one Endpoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function endpoint()
    {
        return $this->belongsTo(Endpoint::class);
    }
}
