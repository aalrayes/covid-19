<?php

namespace App\Http\Controllers;
use App\countries;
use App\covid;
use App\covids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CountriesController extends Controller
{  
    public function index()
{
     return view('world',[
     'data' => countries::all(),
     'cases'=> covids::all()]);
}
    public function show($country){
        return view('world',['country' => countries::find($country)]);
    }

   public function update (Request $request, $country){
    $temp = countries::findOrFail($country);
    $temp -> update($request -> all());
    return $temp;
   }

   public function delete (Request $request, $country){
    $temp = countries::findOrFail($country);
    $temp -> delete();

    return 204;
   }


   
}
