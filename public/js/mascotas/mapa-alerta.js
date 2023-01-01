var map;
const latit = parseFloat(document.querySelector(".latitud").value);
const longit = parseFloat(document.querySelector(".longitud").value);
const foto = document.querySelector(".photo");

console.log(`Foto: ${foto.src}`);

function initMap() {
    console.log(`${latit},${longit}`);
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: latit, lng: longit },
        zoom: 15
    });

    var icon = {
        url: "https://c8.alamy.com/compes/ja6jfc/cool-boxer-perro-pug-permanente-punetazos-con-guantes-de-boxeo-de-cuero-rojo-y-shorts-aislado-sobre-fondo-blanco-ja6jfc.jpg", // url
        // url: foto.src,
        scaledSize: new google.maps.Size(120, 120),
        labelOrigin: new google.maps.Point(55, -8)
    };

    var label = {
        text: "Fernando",
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

    map.addListener("click", (e) => {
        var icon = {
            url: "https://www.abc.es/xlsemanal/wp-content/uploads/sites/5/2022/04/perros-expresiones-faciales-fingir-caras-humanos2.jpg", // url
            scaledSize: new google.maps.Size(120, 120),
            labelOrigin: new google.maps.Point(55, -8)
        };

        var til = {
            text: "Fernando",
            color: 'red',
            fontSize: '34px',
            fontWeight: '700'
        };

        var LL = { lat: latit, lng: longit };

        var marcador = new google.maps.Marker({
            position: LL,
            map: map,
            icon: icon,
            label: til
        });

        map.panTo(e.latLng);
        console.log(e.latLng);

        // console.log(e.latLng.lat().toFixed(6));
        // console.log(e.latLng.lng().toFixed(6));
    });
}