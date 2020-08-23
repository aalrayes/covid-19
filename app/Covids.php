<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Covids extends Model
{
        protected $fillable = ['Country','CountryCode','TotalConfirmed','NewConfirmed','TotalDeaths','NewDeaths','TotalRecovered','NewRecovered'];
        public $timestamps = false;
        protected $primaryKey = 'CountryCode';
        public $incrementing ="false";
        protected $keyType='string';
    
    
        public function Covids()
        {
           return $this->belongsTo('App\country','country_code');
        }
       
    }
    
    
    
