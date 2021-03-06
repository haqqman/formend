<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetupUserAccount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        // Create users options record.
        $event->user->options()->create([
            'enable_pin' => true,
        ]);

        // Create an endpoint for the user...
        $event->user->endpoint()->create([
            'key' => genEndpointKey()
        ]);
    }
}
