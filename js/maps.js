var map, infoWindow, marker;
//var divmap = document.getElementById('map');

// cargarEventListeners();

// function cargarEventListeners() {
//     // Al cargar el documento, mostrar LocalStorage
//     document.addEventListener('DOMContentLoaded', CargarMapa);
// }

// function CargarMapa() {
//     initMap();

// }

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -12.046,
            lng: -77.042
        },
        zoom: 8,
        disableDefaultUI: true,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: true,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: false
    });



    var ubitexto = 'Usted se encuentra aqui';
    infoWindow = new google.maps.InfoWindow({
        content: ubitexto
    });
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitud = position.coords.latitude;
            var longitud = position.coords.longitude;



            var pos = {
                lat: latitud,
                lng: longitud

            };

            marker = new google.maps.Marker({
                position: pos,
                map: map,
                //title: 'titulo 1'
            });
            map.panTo(pos);
            map.setZoom(18);
            infoWindow.open(map, marker);
            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });

            map.setCenter(pos);

            document.getElementById("plat").val=latitud;
            document.getElementById("plng").val=longitud;


        }, function () {
            //Localizacion no encontrada
            handleLocationError(true, infoWindow, map.getCenter());
            map.addListener('click', function(e) {
                placeMarkerAndPanTo(e.latLng, map);
              });

            function placeMarkerAndPanTo(latLng, map) {
              marker = new google.maps.Marker({
                position: latLng,
                map: map
              });
              map.panTo(latLng);
            }
        });
    } else {
        // Navegador no acepta gelocación
        handleLocationError(false, infoWindow, map.getCenter());
    }

}



function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'No es posible determinar su ubicación, seleccione una en el mapa' :
        'Su Navegador no permite gelocación');
    infoWindow.open(map);
}