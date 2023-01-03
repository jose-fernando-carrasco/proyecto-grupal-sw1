var map;
const latit = parseFloat(document.querySelector(".latitud").value);
const longit = parseFloat(document.querySelector(".longitud").value);
const foto = document.querySelector(".photito");
const mascotaName = document.querySelector(".mascota-name");


console.log(`Foto: ${foto.value}`);

function initMap() {
    console.log(`${latit},${longit}`);
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: latit, lng: longit },
        zoom: 15
    });

    var icon = {
        url: foto.value,
        scaledSize: new google.maps.Size(120, 120),
        labelOrigin: new google.maps.Point(55, -8)
    };

    var label = {
        text: mascotaName.value,
        color: 'red',
        fontSize: '34px',
        fontWeight: '700'
    };

    var coordenada = { lat: latit, lng: longit };

    var marcador = new google.maps.Marker({
        position: coordenada,
        map: map,
        icon: icon,
        label: label
    });

    map.panTo(coordenada);
    console.log(coordenada);
}