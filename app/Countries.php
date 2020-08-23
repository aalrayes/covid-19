<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = ['country','population','country_code'];
    public $timestamps = false;
    protected $primaryKey = 'country_code';
    public $incrementing ="false";
    protected $keyType='string';


    public function Countries(){
    $this->hasOne('App\covid');
}






}



