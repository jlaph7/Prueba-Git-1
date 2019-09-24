var map, infoWindow;
var divmap = document.getElementById('map');

cargarEventListeners();

function cargarEventListeners() {
    // Al cargar el documento, mostrar LocalStorage
    document.addEventListener('DOMContentLoaded', CargarMapa);
}

function CargarMapa() {
    initMap();

}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -12.046,
            lng: -77.042
        },
        zoom: 6
    });
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Ubicación Actual');
            infoWindow.open(map);
            map.setCenter(pos);
        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}