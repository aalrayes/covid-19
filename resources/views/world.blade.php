@extends('layout')
@section('content')  
<div class="container-xl">
	<div class="alert alert-success" role="alert" style="display: none">
		Page Created Successfully !!
	  </div>

	  <div class="container-lx mt-3">
		<h5 class=" text-muted">Covid-19 cases around the world</h5>
		   <div class="container-xl border p-2">
			<div id="chartdiv"></div>
		   </div>
	   
	   </div>

	   
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title bg-success">
				<div class="row">
					<div class="col-sm-6">
						<h2 >Countries around the world</h2>
					</div>
					<div class="col-sm-6" >
						<a href="/world/create" class="btn btn-outline-success "><i class="material-icons">&#xE147;</i> <span>Add New Page</span></a>
					</div>
				</div>
			</div>
			<table class="table  table-hover">
				<thead>
					<tr>
						<th onclick="SortTableCountry()"><h6  style="width: fit-content; display:inline-block;">Country</h6> <i class="fa fa-sort" aria-hidden="true"></i></th>
						<th onclick="SortTableCountryCode()" class=""><h6 style="width: fit-content; display:inline-block;">Country Code</h6><i class="fa fa-sort" aria-hidden="true"></i></th>
						<th class="" onclick="SortTablePopulation()"><h6 style="width: fit-content; display:inline-block;">Population</h6><i class="fa fa-sort" aria-hidden="true"></i></th>
						<th class="text-center"><h6>Action</h6></th>
					</tr>
				</thead>
				<tbody id="tbody">
				</tbody>
			</table>
			
			
            
		</div>
	</div>
</div>

<script src="//cdn.amcharts.com/lib/4/core.js"></script>
<script src="//cdn.amcharts.com/lib/4/maps.js"></script>
<script src="//cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="//cdn.amcharts.com/lib/4/geodata/worldHigh.js"></script>

<script>
	var array =  {!! json_encode($data->toArray()) !!};
	var tbody = document.getElementById('tbody');
	var tbodyNode = document.getElementsByTagName('tbody');
	let isAce =true;
	let isAceP =true;
	let isAceC =true;
	console.log(tbodyNode);

	function numberWithCommas(x) {
  return 
}
	function BuildTable(array) {
		tbody.innerHTML=" ";
		array.forEach(element => {
		tbody.insertAdjacentHTML("beforeend",`<tr><td ><a href="world/c/${element.country_code}"><h6>${element.country}</h6></a></td><td class='text-left'><h6>${element.country_code}</h6></td><td class=" text-primary  text-lg-left"><h6>${element.population.replace(/\B(?=(\d{3})+(?!\d))/g, ',')}</h6></td><td class="text-center"><a href="world/c/${element.country_code}/edit" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></td></tr>`);
	});

// 	if(tbodyNode.lengt > 0){
// 		let text = document.getElementById('emp').classList.add('hideEmp');
// 	}else{
// 		let text = document.getElementById('emp').classList.remove('hideEmp');
// 	}
}
	
	function SortTableCountry(){
		array.sort((a,b)=>{ 
		if(isAce){
		if(a.country >b.country){return 1;}
		if(a.country<b.country){return -1;}
		
		}else{
		if(a.country > b.country){return -1;}
		if(a.country<b.country){return 1;}
		}
	});
	isAce=!isAce;
	   BuildTable(array);
	} 
	function SortTablePopulation(){
		document
		array.sort((a,b)=>{ 
		if(isAceP){
		if( parseInt(a.population) > parseInt(b.population)){return 1;}
		if(parseInt(a.population) < parseInt(b.population)){return -1;}	
		}else{
		console.log("im in false:Dec");
		if(parseInt(a.population) > parseInt(b.population)){return -1;}
		if(parseInt(a.population) < parseInt(b.population)){return 1;}
		}
	});
	   isAceP=!isAceP;
	 
	   BuildTable(array);
	} 
	function SortTableCountryCode(){
		array.sort((a,b)=>{ 
		if(isAceC){
		if(a.country_code > b.country_code){return 1;}
		if(a.country_code<b.country_code){return -1;}
		}else{
		if(a.country_code > b.country_code){return -1;}
		if(a.country_code<b.country_code){return 1;}
		}
	});
	   isAceC=!isAceC;
	   BuildTable(array);
	} 
	document.addEventListener(onload,BuildTable(array));
	if(tbody.childNodes == 0){
	}




	

/**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 *
 * For more information visit:
 * https://www.amcharts.com/
 *
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

 
var chart = am4core.create("chartdiv", am4maps.MapChart);
chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

chart.geodata = am4geodata_worldHigh;
chart.projection = new am4maps.projections.Miller();

var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name} \n Total cases: {value} \n Total Recovered: {trecovred} \n Total Deaths: {tdeaths}  \n New Confirmed:{ncase}  \n New Recovred:{nrecovred}  \n New Deaths:{ndeaths}";
polygonSeries.heatRules.push({
  property: "fill",
  target: polygonSeries.mapPolygons.template,
  min: am4core.color("#90b999"),
  max: am4core.color("#28a745")
});
polygonSeries.useGeodata = true;

// add heat legend
var heatLegend = chart.chartContainer.createChild(am4maps.HeatLegend);
heatLegend.valign = "bottom";
heatLegend.align = "left";
heatLegend.width = am4core.percent(100);
heatLegend.series = polygonSeries;
heatLegend.orientation = "horizontal";
heatLegend.padding(20, 20, 20, 20);
heatLegend.valueAxis.renderer.labels.template.fontSize = 10;
heatLegend.valueAxis.renderer.minGridDistance = 40;

polygonSeries.mapPolygons.template.events.on("over", event => {
  handleHover(event.target);
});

polygonSeries.mapPolygons.template.events.on("hit", event => {
  handleHover(event.target);
});

function handleHover(mapPolygon) {
  if (!isNaN(mapPolygon.dataItem.value)) {
    heatLegend.valueAxis.showTooltipAt(mapPolygon.dataItem.value);
  } else {
    heatLegend.valueAxis.hideTooltip();
  }
}

polygonSeries.mapPolygons.template.strokeOpacity = 0.4;
polygonSeries.mapPolygons.template.events.on("out", event => {
  heatLegend.valueAxis.hideTooltip();
});

chart.zoomControl = new am4maps.ZoomControl();
chart.zoomControl.valign = "top";

var arrayOfCases ={!! json_encode($cases->toArray()) !!};
var arrayData=[];

var arrayIncluded=[];



console.log(arrayOfCases);
arrayOfCases.forEach(element => {

arrayData.push({
	id: element.CountryCode,
	value:element.TotalConfirmed,
	ncase:element.NewConfirmed,
	tdeaths:element.TotalDeaths,
	ndeaths:element.NewDeaths,
	trecovred:element.TotalRecovered,
	nrecovred:element.NewRecovered
});
arrayIncluded.push(element.CountryCode);
});

console.log(arrayData);

// life expectancy data
polygonSeries.data = arrayData;

// excludes Antarctica
polygonSeries.exclude =['AQ'] ;

let zoomTo = arrayIncluded;

chart.events.on("ready", function(ev) {
  // Init extremes
  var north, south, west, east;

  // Find extreme coordinates for all pre-zoom countries
  for(let i = 0; i < zoomTo.length; i++) {
    var country = polygonSeries.getPolygonById(zoomTo[i]);
    if (north == undefined || (country.north > north)) {
      north = country.north;
    }
    if (south == undefined || (country.south < south)) {
      south = country.south;
    }
    if (west == undefined || (country.west < west)) {
      west = country.west;
    }
    if (east == undefined || (country.east > east)) {
      east = country.east;
    }
    country.isActive = true
  }

  // Pre-zoom
  chart.zoomToRectangle(north, east, south, west, 1, true);
});

</script>



@endsection
