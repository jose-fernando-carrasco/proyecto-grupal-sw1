
var map;
var marker;
var lat = document.getElementById('lat_dom');
var lng = document.getElementById('lng_dom');
lat = Number(lat.innerHTML);
lng = Number(lng.innerHTML);

console.log('carga el archivo');

function initMap() {
    console.log('entrando');

    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: lat,
            lng: lng
        },
        zoom: 15
    });

    console.log(lat, lng);
    console.log('entrando');

    marker = new google.maps.Marker({
        position: {
            lat: lat,
            lng: lng
        },
        map: map,
    });

    map.panTo({ lat, lng });
}

window.initMap = initMap;
