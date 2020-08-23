@extends('layout')
@section('content')

<div class="container-xl mt-4">

    <h4 class=" text-monospace text-muted">Edit Page</h4>

</div>

<form action="/world/{{$country['country_code']}}" method="POST">

    @csrf
    @method('PUT')
 
    <div style="background-color:white; border-radius:10px"class="container-xl mt-4 p-4">
    

<div class="container-xl mt-3" id="form">

    <div class="row">
        <div class="col-12">
            <div class="form-group">
              <label for=""> <h6>Country</h6></label>
              <input type="text" class="form-control" name="Country" id="Country"  placeholder="">
              
            </div>
        </div>
    </div>

    <div class="row">
      <div class=" col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>Country code</h6></label>
          <input type="text" class="form-control " name="CountryCode" id="CountryCode" aria-describedby="helpId" placeholder="" readonly  value="" required>
          
        </div>

      </div>
      <div class=" col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>Population</h6></label>
          <input type="text" class="form-control" name="Population" id="Population" aria-describedby="helpId"  placeholder=""  value="" required>
        </div>


      </div>
    </div>

    <div class="row">
      <div class=" col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>Total confirmed </h6></label>
          <input type="text" class="form-control" name="TotalConfirmed" id="TotalConfirmed" aria-describedby="helpId" placeholder=""  value="" required>
          
        </div>

      </div>
      <div class="col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>New confirmed </h6></label>
          <input type="text" class="form-control" name="NewConfirmed" id="NewConfirmed" aria-describedby="helpId" placeholder=""  value="" required>
          
        </div>

      </div>
    </div>


    <div class="row">
      <div class=" col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>Total recovered </h6></label>
          <input type="text" class="form-control" name="TotalRecovered" id="TotalRecovered" aria-describedby="helpId" placeholder=""  value="" required>
        </div>

      </div>
      <div class=" col-6">


    
    <div class="form-group mt-3">
      <label for="cd"><h6>New recovered</h6></label>
      <input type="text" class="form-control" name="NewRecovered" id="NewRecovered" aria-describedby="helpId" placeholder=""  value="" required>
    </div>

      </div>
    </div>


    <div class="row">
      <div class=" col-6">

        <div class="form-group mt-3">
          <label for="cd"><h6>Total deaths</h6></label>
          <input type="text" class="form-control" name="TotalDeaths" id="TotalDeaths" aria-describedby="helpId" placeholder=""  value="" required>
        </div>

      </div>
      <div class=" col-6">
        <div class="form-group mt-3">
          <label for="cd"><h6>New deaths</h6></label>
          <input type="text" class="form-control" name="NewDeaths" id="NewDeaths" aria-describedby="helpId" placeholder=""  value="" required>
          
        </div>
      </div>
    </div>

    
    <div class="container-fluid text-center p-0 mt-3">
        <button type="submit" class="btn btn-outline-success w-50">Submit</button>
    </div> 
  </div>
  </form>

  <script>
let covid = {!!json_encode($covid)!!};
let country ={!!json_encode($country)!!};

console.log(covid);
console.log(country);

  let Country = document.getElementById('Country');
  let TotalConfiremed = document.getElementById('TotalConfirmed');
  console.log(TotalConfiremed);
  let NewConfiremed = document.getElementById('NewConfirmed'); 
  console.log(NewConfiremed);
  let Population = document.getElementById('Population');
  console.log(Population);
  let CountryCode = document.getElementById('CountryCode');
  console.log(CountryCode);
  let TotalRecovered = document.getElementById('TotalRecovered');
  console.log(TotalRecovered);
  let NewRecovered = document.getElementById('NewRecovered');
  console.log(NewRecovered);
  let TotalDeaths = document.getElementById('TotalDeaths');
  console.log(TotalDeaths);
  let NewDeaths = document.getElementById('NewDeaths');
  console.log(NewDeaths);

    Country.value = covid.Country;
    Population.value=country['population'];
    //console.log(Population.vlaue);
    CountryCode.value = covid.CountryCode;
    //console.log(CountryCode.vlaue);
    TotalConfiremed.value = covid.TotalConfirmed;
    //console.log(TotalConfiremed.vlaue);
    NewConfiremed.value =covid.NewConfirmed;
    //console.log(Population.vlaue);
    TotalRecovered.value =covid.TotalRecovered;
    //console.log(Population.vlaue);
    NewRecovered.value = covid.NewRecovered;
    //console.log(Population.vlaue);
    TotalDeaths.value = covid.TotalDeaths;
    //console.log(Population.vlaue);
    NewDeaths.value = covid.NewDeaths;

   //let form = document.getElementById('form');
   
   //form.innerHTML="";

  // form.insertAdjacentHTML("beforeend",'<div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Country code</h6></label> <input type="text" class="form-control " name="CountryCode" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Population</h6></label> <input type="text-disabled" class="form-control" name="Population" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total confirmed </h6></label> <input type="text-disabled" class="form-control" name="TotalConfirmed" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New confirmed </h6></label> <input type="text-disabled" class="form-control" name="NewConfirmed" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total recovered </h6></label> <input type="text-disabled" class="form-control" name="TotalRecovered" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New recovered</h6></label> <input type="text-disabled" class="form-control" name="NewRecovered" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total deaths</h6></label> <input type="text-disabled" class="form-control" name="TotalDeaths" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New deaths</h6></label> <input type="text-disabled" class="form-control" name="NewDeaths" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div>');


  </script>

@endsection