<?php

namespace App\Listener;

use App\Events\NewLike;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LikeListener
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
     * @param  NewLike  $event
     * @return void
     */
    public function handle(NewLike $event)
    {
        //
    }
}
