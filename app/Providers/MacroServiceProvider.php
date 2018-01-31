<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Cache;
use App\Currency;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('cached',function(){

            if(!Cache::has('cached_query')){
                Cache::forever('cached_query',$this->get()->toArray());
                Log::info('in if');
            }
            Log::info('oout');
            return collect(Cache::get('cached_query'));
        });


        /*Currency::updated(function($currency){

            info("enabling hooks for currency code $currency->id at ".time());
            
            $data = [
                'currency' => $currency
            ];

            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://requestb.in/1cve8y81' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $data ) );
            curl_exec($ch );
            curl_close( $ch );
        });*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
