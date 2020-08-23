@extends('layout')
@section('content')  

<div class="container-xl container-fluid">
    
    <div class="container-xl">         
          
   
       
   
        <br>
    <h3 class="text-muted"> Covid-19 Statistics for <span class="text-primary">{{$country['Country']}}</span></h3>
          <hr>
           
          <div class="container-fluid">

            <div class="row">

<div class="col-6">

         {{-- Cards --}}
         <div class="card  mb-3" style="max-width: 100%;">
            <div class="card-header text-center bg-primary text-white">Total Confirmed cases</div>
            <div class="card-body">
              <h5 class="card-title text-center text-primary">{{number_format(intval($country['TotalConfirmed']))}}</h5>   
            </div>
        </div>

</div>

<div class="col-6">

 {{-- Cards --}}
 <div class="card mb-3" style="max-width: 100%;">
    <div class="card-header text-center bg-primary text-white">New Confirmed Cases</div>
    <div class="card-body">
      <h5 class="card-title text-center text-primary">      
       
        {{number_format(intval($country['NewConfirmed']))}}  
      
      </h5>   
    </div>
</div>
</div>


</div>


<div class="row">

    <div class="col-6">
       {{-- Cards --}}
       <div class="card  mb-3" style="max-width: 100%;">
        <div class="card-header bg-success text-center text-white">Total Recoveries</div>
        <div class="card-body">
          <h5 class="card-title text-center text-success">{{number_format(intval($country['TotalRecovered']))}}</h5>   
        </div>
    </div>
    </div>
    <div class="col-6">
                 {{-- Cards --}}
                 <div class="card text-black mb-3" style="max-width: 100%;">
                    <div class="card-header bg-success text-center text-white">New Recoveries</div>
                    <div class="card-body">
                      <h5 class="card-title text-center text-success">  
                        {{number_format(intval($country['NewRecovered']))}}  
                      </h5>   
                    </div>
                </div>
    </div>
    
    
    </div>


<div class="row">

  <div class="col-6">
     {{-- Cards --}}
     <div class="card  mb-3" style="max-width: 100%;">
      <div class="card-header bg-danger text-center text-white">Total Deaths</div>
      <div class="card-body">
        <h5 class="card-title text-center text-danger">{{number_format(intval($country['TotalDeaths']))}}</h5>   
      </div>
  </div>
  </div>
  <div class="col-6">
               {{-- Cards --}}
               <div class="card text-black mb-3" style="max-width: 100%;">
                  <div class="card-header bg-danger text-center text-white">New Deaths</div>
                  <div class="card-body">
                    <h5 class="card-title text-center text-danger">  
                      {{number_format(intval($country['NewDeaths']))}}  
                    </h5>   
                  </div>
              </div>
  </div>
  
  
  </div>

      

            

          






        </div>

    </div>   
</div>   




@endsection
