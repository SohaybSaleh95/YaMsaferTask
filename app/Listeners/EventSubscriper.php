<?php

namespace App\Listeners;

class EventSubscriper{

	public function onCurrencyUpdated($event){

	}

	public function subscribe($events)
    {
        $events->listen(
            'App\Events\CurrencyUpdated',
            'App\Listeners\EventSubscriper@onCurrencyUpdated'
        );
    }
}