@extends('layout')
@section('content')

<div class="container-xl mt-4">

    <h4 class=" text-monospace text-muted">New Page</h4>

</div>

<div style="background-color:white; border-radius:10px"class="container-xl mt-4 p-4">

    <form action="/world" method="POST">
        @csrf        
        <label for="cont"><h6>Countries</h6></label>
        <select class="form-control form-control-md" name="Country"id="cont">
        <option value="">Select a Country</option>
        @foreach ($covid->Countries as $item)
        <option value="{{$item->Country}}" id={{$stripped = str_replace(' ', '',$item->Country )}}>{{$item->Country}}</option> 
        @endforeach
    </select>

    <div class="container-xl mt-3" id="form">

      <div class="row">
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>Country code</h6></label>
            <input type="text" class="form-control " name="CountryCode" id="CountryCode" aria-describedby="helpId" placeholder="" readonly value="" required>
            
          </div>

        </div>
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>Population</h6></label>
            <input type="text" class="form-control" name="Population" id="Population" aria-describedby="helpId" readonly placeholder=""  value="" required>
          </div>


        </div>
      </div>

      <div class="row">
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>Total confirmed </h6></label>
            <input type="text" class="form-control" name="TotalConfirmed" id="TotalConfirmed" aria-describedby="helpId" placeholder="" readonly value="" required>
            
          </div>

        </div>
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>New confirmed </h6></label>
            <input type="text" class="form-control" name="NewConfirmed" id="NewConfirmed" aria-describedby="helpId" placeholder="" readonly value="" required>
            
          </div>

        </div>
      </div>


      <div class="row">
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>Total recovered </h6></label>
            <input type="text" class="form-control" name="TotalRecovered" id="TotalRecovered" aria-describedby="helpId" placeholder="" readonly value="" required>
          </div>

        </div>
        <div class=" col-6">


      
      <div class="form-group mt-3">
        <label for="cd"><h6>New recovered</h6></label>
        <input type="text" class="form-control" name="NewRecovered" id="NewRecovered" aria-describedby="helpId" placeholder="" readonly value="" required>
      </div>

        </div>
      </div>


      <div class="row">
        <div class=" col-6">

          <div class="form-group mt-3">
            <label for="cd"><h6>Total deaths</h6></label>
            <input type="text" class="form-control" name="TotalDeaths" id="TotalDeaths" aria-describedby="helpId" placeholder="" readonly value="" required>
          </div>

        </div>
        <div class=" col-6">
          <div class="form-group mt-3">
            <label for="cd"><h6>New deaths</h6></label>
            <input type="text" class="form-control" name="NewDeaths" id="NewDeaths" aria-describedby="helpId" placeholder="" readonly value="" required>
            
          </div>
        </div>
      </div>

      
      
    </div>

    <div class="container-fluid text-center p-0 mt-3">
        <button type="submit" class="btn btn-outline-success w-50">Submit</button>
    </div>

    </form>

    
</div>


<script>

let arrayOfCountriesCovid = {!!json_encode($covid->Countries)!!};
let arrayOfCountriesPopulation ={!!json_encode($population)!!};
let select = document.getElementById('cont');




select.addEventListener('change',()=>{

  let selectedCountry = select.options[select.selectedIndex].id;

  console.log(selectedCountry);

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

  function getCurrrentObject(array){
    const current = array.findIndex((country,index)=>{
    let countrys =country.country; 
    countrys = countrys.replace(/\s+/g, '');

    return countrys == selectedCountry;

  });
  return array[current];
  }

  function getCurrrentObjectCase(array){
    const current = array.findIndex((country,index)=>{
    let countrys =country.Country; 
    countrys = countrys.replace(/\s+/g, '');

    return countrys == selectedCountry.replace(/\s+/g, '');

  });
  return array[current];
  }

  var pop = getCurrrentObject(arrayOfCountriesPopulation);
  
  var cases = getCurrrentObjectCase(arrayOfCountriesCovid);

  console.log(pop);

    Population.value=pop.population;
    //console.log(Population.vlaue);
    CountryCode.value = cases.CountryCode;
    //console.log(CountryCode.vlaue);
    TotalConfiremed.value = cases.TotalConfirmed;
    //console.log(TotalConfiremed.vlaue);
    NewConfiremed.value =cases.NewConfirmed;
    //console.log(Population.vlaue);
    TotalRecovered.value =cases.TotalRecovered;
    //console.log(Population.vlaue);
    NewRecovered.value = cases.NewRecovered;
    //console.log(Population.vlaue);
    TotalDeaths.value = cases.TotalDeaths;
    //console.log(Population.vlaue);
    NewDeaths.value = cases.NewDeaths;

   //let form = document.getElementById('form');
   
   //form.innerHTML="";

  // form.insertAdjacentHTML("beforeend",'<div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Country code</h6></label> <input type="text" class="form-control " name="CountryCode" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Population</h6></label> <input type="text-disabled" class="form-control" name="Population" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total confirmed </h6></label> <input type="text-disabled" class="form-control" name="TotalConfirmed" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New confirmed </h6></label> <input type="text-disabled" class="form-control" name="NewConfirmed" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total recovered </h6></label> <input type="text-disabled" class="form-control" name="TotalRecovered" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New recovered</h6></label> <input type="text-disabled" class="form-control" name="NewRecovered" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div> <div class="row"> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>Total deaths</h6></label> <input type="text-disabled" class="form-control" name="TotalDeaths" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> <div class=" col-6"> <div class="form-group mt-3"> <label for="cd"><h6>New deaths</h6></label> <input type="text-disabled" class="form-control" name="NewDeaths" id="cd" aria-describedby="helpId" placeholder="" readonly value="" required> </div> </div> </div>');

  });




</script>



@endsection