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
var controlUI;
function CenterControl(controlDiv, map) {

    // Set CSS for the control border.
    controlUI = document.createElement('img');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click para detectar ubicación';
    controlUI.src='images/maps/1x/personpin.png';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    // var controlText = document.createElement('div');
    // controlText.style.color = 'rgb(25,25,25)';
    // controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    // controlText.style.fontSize = '16px';
    // controlText.style.lineHeight = '38px';
    // controlText.style.paddingLeft = '5px';
    // controlText.style.paddingRight = '5px';
    // //controlText.innerHTML = 'Ubicación';
    // controlUI.appendChild(controlText);

    // Setup the click event listeners: simply set the map to Chicago.
    controlUI.addEventListener('click', function () {
        Localizarme();
    });

}

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -12.046,
            lng: -77.042
        },
        zoom: 12,
        disableDefaultUI: true,
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: true,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: false
    });
    var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);

    //Localizarme();


}

function Localizarme() {
    var ubitexto = '¿Se encuentra aqui?';
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
            var imagen = 'images/maps/1x/personpin.png';
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                icon: imagen,
                animation: google.maps.Animation.DROP,
                //title: 'titulo 1'
            });
            map.panTo(pos);
            map.setZoom(18);
            infoWindow.open(map, marker);
            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });

            map.setCenter(pos);

            document.getElementById("plat").innerHTML = latitud;
            document.getElementById("plng").innerHTML = longitud;


        }, function () {
            //Localizacion no encontrada
            handleLocationError(true, infoWindow, map.getCenter());
            map.addListener('click', function (e) {
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