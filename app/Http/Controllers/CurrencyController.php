<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller
{
    public function getList(){
        $Currencies = Currency::cached();
        return response()->json($Currencies,200);
    }

    public function rate($to){
        $c = Currency::find($to);
        if($c == null){
            return response()->json(['msg' => 'NotFound'],404);
        }

        return response()->json($c,200);
    }
}
