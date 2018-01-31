<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService{
    public static function currencies(){
        $client = new Client();
        $res = $client->request('GET', 'https://free.currencyconverterapi.com/api/v5/currencies');
        if($res->getStatusCode() == 200){
            return json_decode($res->getBody())->results;
        }
    }

    public static function rate($to,$from='USD'){
        $client = new Client();
        $res = $client->request('GET',"https://free.currencyconverterapi.com/api/v5/convert?q=".$from."_".$to."&compact=y");
        if($res->getStatusCode() == 200){
            $ke = $from."_".$to;
            return json_decode($res->getBody())->$ke->val;
        }

        return 0;
    }
}