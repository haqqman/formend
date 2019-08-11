<?php

use Illuminate\Support\Str;

/**
 * Generate unique key for users' URL
 * submission endpoint.
 *
 * @return string
 */
function genEndpointKey() {
    $key = Str::random(mt_rand(8, 14));

    return $key;
}
