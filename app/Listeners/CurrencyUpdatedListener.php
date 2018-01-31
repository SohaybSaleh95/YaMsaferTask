<?php

namespace App\Listeners;

use App\Events\CurrencyUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CurrencyUpdatedListener implements ShouldQueue
{
    use InteractsWithQueue;
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
     * @param  Event  $event
     * @return void
     */
    public function handle(CurrencyUpdated $event)
    {
        info("enabling hooks for currency code $event->currency->id at ".time());
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://requestb.in/142ds3c1' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $event->currency ) );
        curl_exec($ch );
        curl_close( $ch );
        /*$client = new \GuzzleHttp\Client();
        $request = new \GuzzleHttp\Psr7\Request('POST', 'https://requestb.in/1cve8y81',['body' => $event->currency]);
        $client->sendAsync($request);*/
    }
}
