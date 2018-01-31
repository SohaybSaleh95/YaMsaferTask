<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiService;
use App\Currency;
use App\Events\CurrencyUpdated;
use Illuminate\Support\Facades\Artisan;

class PopulateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:populate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Currencies Database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*$currnecies = ApiService::currencies();
        $toConvert = ['USD','JOD','ILS','SAR'];
        foreach($currnecies as $c){
            Currency::updateOrCreate(['currencySymbol' => ($c->currencySymbol ?? 'No Symbol'),'name' => $c->currencyName],['code' => $c->id]);
            if(in_array($c->id,$toConvert)){
                $curr = Currency::find($c->id);
                $curr->rate = ApiService::rate($c->id);
                $curr->save();
                event(new CurrencyUpdated($curr));
                info("Just saved currency code $c->id at ".time());
                
                //Currency::where('code',$c->id)->update(['rate' => ApiService::rate($c->id)]);
            }
        }*/

        $currnecies = Currency::all();
        $toConvert = ['USD','JOD','ILS','SAR'];
        foreach($currnecies as $c){
            Currency::updateOrCreate(['currencySymbol' => ($c->currencySymbol ?? 'No Symbol'),'name' => $c->name],['code' => $c->code]);
            if(in_array($c->code,$toConvert)){
                $curr = Currency::find($c->code);
                //$curr->rate = ApiService::rate($c->code);
                $curr->save();
                event(new CurrencyUpdated($curr));
                info("Just saved currency code $c->code at ".time());
                
                //Currency::where('code',$c->id)->update(['rate' => ApiService::rate($c->id)]);
            }
        }

        /*

        foreach($toConvert as $c){
            
        }*/
    }
}
