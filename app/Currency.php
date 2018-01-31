<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use MyModel;

class Currency extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'code';

    protected $fillable = [
        'code',
        'name',
        'currencySymbol'
    ];

    public function toArray(){
        return [
            'code' => $this->code,
            'name' => $this->name,
            'symbol' => $this->currencySymbol,
            'rate' => $this->rate
        ];
    }
}
