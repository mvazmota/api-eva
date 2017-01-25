<?php

namespace App\Listeners;

use App\Events\Newlist;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewListNotification
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
     * @param  Newlist  $event
     * @return void
     */
    public function handle(Newlist $event)
    {
        return 'sucess';
    }
}
