<?php

namespace App\Providers;

use App\Providers\CartsEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CartEventHandler
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
     * @param  CartsEvent  $event
     * @return void
     */
    public function handle(CartsEvent $event)
    {
        //
    }
}
