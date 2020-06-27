<?php

namespace App\Listeners;

use IlluminateAuthEventsLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Fasaces\Session;
use Spatie\ActivityLog\Models\Activity;

class LoginSuccessfull
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->subject = 'login';
        $event->description = 'Login Login successfull';

        activity($event->subject)
            ->by($event->user)
            ->withProperties(['last_login' => date('d-m-Y H:m:i')])
            ->log($event->description);
    }
}
