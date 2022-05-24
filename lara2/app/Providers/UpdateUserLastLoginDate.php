<?php

namespace App\Providers;

use App\Providers\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserLastLoginDate
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
     * @param  \App\Providers\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //
    }
}
