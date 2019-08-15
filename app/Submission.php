<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    /**
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * A submission belongs to an endpoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function endpoint()
    {
        return $this->belongsTo(Endpoint::class);
    }

    /**
     * A submission belongs to a domain associated with an endpoint.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
