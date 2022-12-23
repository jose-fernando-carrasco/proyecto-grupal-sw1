const Formulario = document.querySelector(".formulario");
const input = document.querySelector(".entrada");
var map;
var marcador;
var contador = 0;
var latitud = null;
var longitud = null;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -17.795768, lng: -63.167202 },
        zoom: 17
    });

    map.addListener("click", (e) => {
        placeMarkerAndPanTo(e.latLng, map);
    });

    function placeMarkerAndPanTo(latLng, map) {
        if (contador > 0) {
            marcador.setMap(null);
        }
        marcador = new google.maps.Marker({
            position: latLng,
            map: map,
        });
        contador++;
        map.panTo(latLng);
        latitud = latLng.lat().toFixed(6);
        longitud = latLng.lng().toFixed(6);
    }
}

Formulario.addEventListener("submit", event => {
    event.preventDefault();
    // (latitud == null && longitud == null) && 
    if ((latitud == null && longitud == null) || input.value.length == 0) {
        // console.log('debe marcar ubi');
        var cad = '';
        if (input.value.length == 0) {
            cad = 'Debe escribir un detalle';
        } else {
            cad = 'Debe Marcar Ubicacion';
        }
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: cad,
            showConfirmButton: false,
            timer: 1500
        });
    } else {
        axios.post('/mascotas/alertaStore', {
            latitud: latitud,
            longitud: longitud,
            detalle: input.value,
            mascota_id: 1 //prueba constante
        }).then(res => {
            console.log(res.data);
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Alerta Creada',
                showConfirmButton: false,
                timer: 1500
            });
        }).catch(error => {
            console.log(error);
        });
    }

});