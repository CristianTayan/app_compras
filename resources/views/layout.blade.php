<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8 ">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Delivery | Administración</title>
  <style>
   
    #map canvas {
    cursor: crosshair;
    }
    </style>
  <script src="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.10.1/mapbox-gl.css" rel="stylesheet" />
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
<link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
  
  <!-- sweet alert -->
  <link href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css" rel="stylesheet"/>
  <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>
  

  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.css')}}">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">
 
  <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
  
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
  

  <link rel="stylesheet" href="{{ asset('bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-purple-light sidebar-mini">
<div class="wrapper">
  
  @include('navbar')
  @include('aside')
  <div class="content-wrapper">
    @yield('contenido')
  </div>
  @include('footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset("bower_components/jquery/dist/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
<script src="{{asset("dist/js/bootstrap-fileinput/js/fileinput.min.js")}}"></script>
<script src="{{asset("dist/js/bootstrap-fileinput/js/locales/es.js")}}"></script>
<script src="{{asset("dist/js/bootstrap-fileinput/themes/fas/theme.min.js")}}"></script>



<script src="{{asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("bower_components/select2/dist/js/select2.full.min.js")}}"></script>

<script>
  

   $('.select2').select2()
   
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })

  });
  $(document).ready(function() {
    setTimeout(function() {
		// Declaramos la capa mediante una clase para ocultarlo
        $("#midiv").fadeOut(1500);
    },3000);
});

function  confirmarEstado(){
  
	swal({
		title: "Cambiar estado?",
		text: "Desea cambiar el estado",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Si, cambiar!',
		closeOnConfirm: true
	}
  ).then((result) => {
  if (result.value) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
  
};



   document.getElementById("FOTO").onchange = function(e) {
  let reader = new FileReader();
  reader.readAsDataURL(e.target.files[0]);

  reader.onload = function(){
    let preview = document.getElementById('preview'),  
  image = document.createElement('img');
  image.style.width='120px';
  image.style.height='100px';
  image.src = reader.result;
     preview.innerHTML = '';
     preview.append(image);        
  };
}


</script>

  <script>
   
    var latitud =  document.getElementById("latitud").value;
    
    var longitud =  document.getElementById("longitud").value;
    
    var user_location = [ latitud, longitud];
    mapboxgl.accessToken = 'pk.eyJ1IjoiZWRpc29udGF5YW4iLCJhIjoiY2thbWt1Ynd0MWY2bjJ4cDRlcmpobGN3aiJ9.C26w_72d9I_1HQShzrh6Ow';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: user_location,
        zoom: 14
    });
    map.addControl(new mapboxgl.NavigationControl());
  map.addControl(new mapboxgl.FullscreenControl());
  map.addControl(new mapboxgl.GeolocateControl({
      positionOptions: {
          enableHighAccuracy: true
      },
      trackUserLocation: true
  }));
    //  geocoder here
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        // limit results to Australia
        //country: 'IN',
    });

    var marker ;

    // After the map style has loaded on the page, add a source layer and default
    // styling for a single point.
    map.on('load', function() {
        addMarker(user_location,'load');
        add_markers(saved_markers);

        // Listen for the result event from the MapboxGeocoder that is triggered when a user
        // makes a selection and add a symbol that matches the result.
        geocoder.on('result', function(ev) {
            alert("aaaaa");
            console.log(ev.result.center);

        });
    });
    map.on('click', function (e) {
        marker.remove();
        addMarker(e.lngLat,'click');
        var features = map.queryRenderedFeatures(e.point);
 
// Limit the number of properties we're displaying for
// legibility and performance
var displayProperties = [
'properties'  
];
 
var displayFeatures = features.map(function(feat) {
var displayFeat = {};
displayProperties.forEach(function(prop) {
displayFeat[prop] = feat[prop];
});
return displayFeat;
});

 var calle = displayFeatures[0].properties.name;


       document.getElementById("features").value = calle;
        //console.log(e.lngLat.lat);
        document.getElementById("lat").value = e.lngLat.lat;
        document.getElementById("lng").value = e.lngLat.lng;

    });

    function addMarker(ltlng,event) {

        if(event === 'click'){
            user_location = ltlng;
        }
        marker = new mapboxgl.Marker({draggable: true,color:"#d02922"})
            .setLngLat(user_location)
            .addTo(map)
            .on('dragend', onDragEnd);
    }
    function add_markers(coordinates) {

        var geojson = (saved_markers == coordinates ? saved_markers : '');

        console.log(geojson);
        // add markers to map
        geojson.forEach(function (marker) {
            console.log(marker);
            // make a marker for each feature and add to the map
            new mapboxgl.Marker()
                .setLngLat(marker)
                .addTo(map);
        });

    }

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        document.getElementById("lat").value = lngLat.lat;
        document.getElementById("lng").value = lngLat.lng;
        document.getElementById("features").value = calle;
        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
    }

    $('#signupForm').submit(function(event){
        event.preventDefault();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data){
                alert(data);
                location.reload();
            }
        });
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

  </script>  
  <script>

$('#diaInicio').change(function(){
  $('#diaFin').removeAttr('disabled');
});

$('#diaFin').change(function(){
  $('#horaInicio').removeAttr('disabled');
});

$('#horaInicio').change(function(){
  $('#horaFin').removeAttr('disabled');
});

    </script> 
    <script>

var options = {
		Lunes : ["Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"],
    Martes : ["Miércoles","Jueves","Viernes","Sábado","Domingo"],
    Miércoles : ["Jueves","Viernes","Sábado","Domingo"],
    Jueves : ["Viernes","Sábado","Domingo"],
    Viernes : ["Sábado","Domingo"],
    Sábado : ["Domingo"],
    Domingo : [""]
}

$(function(){
	var fillSecondary = function(){
		var selected = $('#diaInicio').val();
		$('#diaFin').empty();
		options[selected].forEach(function(element,index){
			$('#diaFin').append('<option value="'+element+'">'+element+'</option>');
		});
	}
	$('#diaInicio').change(fillSecondary);
	fillSecondary();
});
    </script>

  
</body>
</html>