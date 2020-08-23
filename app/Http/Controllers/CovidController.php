<?php

namespace App\Http\Controllers;
use App\countries;
use App\covids;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;


class CovidController extends Controller
{  
       function updateDataBase(){
        //gets all records in the 
        $countrys = json_decode(Http::get("https://api.covid19api.com/summary"));

        foreach($countrys->Countries as $item){
            covids::where('CountryCode',$item->CountryCode)->update([ 
                'TotalConfirmed' => $item->TotalConfirmed,
                'NewConfirmed' => $item->NewConfirmed,
                'TotalDeaths' => $item->TotalDeaths,
                'NewDeaths' => $item->NewDeaths,
                'TotalRecovered' => $item->TotalRecovered,
                'NewRecovered'=> $item->NewRecovered
            ]);
        
        }

       return redirect()->back()->with('messager',"Operation succesfull");
     }

    public function index(){   
     return view('countries',[ 'data' => covids::all()]);
   }
    public function show($request){
        $co=covids::find($request)->toArray();
        return view('countries',['country' => $co ]);
   }

   public function create(){
    return view("add",
    
    ["covid"=> json_decode(Http::get("https://api.covid19api.com/summary")),
     "population" => json_decode(file_get_contents(public_path('assets/countrys-by-population.json')))
    
    ]);
   }

   public function update ($code)
   {
       
        $covid = covids::findOrFail($code);
        $countries = countries::findOrFail($code);
    
        $countries->country = request('Country');
        $countries->population = request('Population');
        //$countries->country_code= request('CountryCode');
        $covid->Country =request('Country');
       // $covid->CountryCode=request('CountryCode');
       $covid->Country = request('Country');
        $covid->TotalConfirmed = request('TotalConfirmed');
        $covid ->NewConfirmed = request('NewConfirmed');
        $covid ->TotalDeaths = request('TotalDeaths');
        $covid ->NewDeaths = request('NewDeaths');
        $covid ->TotalRecovered = request('TotalRecovered');
        $covid ->NewRecovered= request('NewRecovered');
        
        $countries->save();
        $covid->save();

    
    return redirect('/');
   }

   public function edit($request){

   // dd($request);
       return view('edit',[
           'country'=>(countries::find($request)->toArray()),
           'covid'=>covids::find($request)->toArray()
       ]);
   }

   public function store(Request $request){

        $covid = new Covids();
        $countries = new Countries(); 

        $countries->country = $request['Country'];
        $countries->population = $request['Population'];
        $countries->country_code= $request['CountryCode'];
        $covid->Country =$request['Country'];
        $covid->CountryCode=$request['CountryCode'];
        $covid->TotalConfirmed = $request['TotalConfirmed'];
        $covid ->NewConfirmed = $request['NewConfirmed'];
        $covid ->TotalDeaths = $request['TotalDeaths'];
        $covid ->NewDeaths = $request['NewDeaths'];
        $covid ->TotalRecovered = $request['TotalRecovered'];
        $covid ->NewRecovered= $request['NewRecovered'];
        
        $countries->save();
        $covid->save();
        
          
      
     return redirect('/');
   }
    
   public function delete (Request $request, $country){
    $temp = covids::findOrFail($country);
    $temp -> delete();

    return 204;
   }

}
