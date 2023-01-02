
window.Alpine = Alpine

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -17.795768, lng: -63.167202 },
        zoom: 17
    })

    var marcador = null

    map.addListener("click", (e) => {
        placeMarkerAndPanTo(e.latLng, map);
        marcador && console.log(marcador.getPosition());
    });

    function placeMarkerAndPanTo(latLng, map) {
        if (!!marcador && marcador.getMap()) {
            marcador.setMap(null);
        }
        marcador = new google.maps.Marker({
            position: latLng,
            map: map,
        });
        map.panTo(latLng);

        const alpine_component = document.getElementById('adopciones')
        alpine_component.$data.latitud = latLng.lat().toFixed(6)
        alpine_component.$data.longitud = latLng.lng().toFixed(6)
        // latitud = latLng.lat().toFixed(6);
        // longitud = latLng.lng().toFixed(6);
    }
}

window.initMap = initMap

Alpine.data('adopciones', () => ({
    open: false,
    id_mascota: null,
    mascota: {
        nombre: null,
        duenho: null,
        raza: null,
        photo: null,
    },
    latitud: null,
    longitud: null,
    description: null,
    direction: null,

    init() {
        this.$watch('id_mascota', value => {
            this.setMascota(value)
        })
    },

    toggle() {
        this.open = !this.open
    },

    async setMascota(id_mascota) {
        //get the domain of the url
        let url_api = window.location.origin + '/api'
        //make a get with fetch
        const resp = await fetch(url_api + '/mascotas/' + id_mascota)
        const data = await resp.json()

        if (!data) {
            return
        }

        this.mascota.nombre = data.nombre
        this.mascota.duenho = data.duenho.name
        this.mascota.raza = data.raza_mascota.nombre
        this.mascota.photo = data.imagen
    },

    async sendForm() {
        if (!this.id_mascota || !this.latitud || !this.longitud) {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Falta de datos',
                text: 'Debe seleccionar una mascota y marcar una ubicación',
                showConfirmButton: true,
            })
        } else {
            //make a time out to show the alert
            new Swal({
                title: 'Guardando...',
                text: 'Espere por favor',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })

            const resp = await this.saveAdopcion()

            if (resp.ok) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Adopción registrada',
                    showConfirmButton: true,
                    didClose: () => {
                        window.location.href = window.location.origin + '/dashboard'
                    }
                })
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: resp.statusText,
                    showConfirmButton: true,
                    timer: 1500
                })
            }
        }
    },

    async saveAdopcion() {
        //get the domain of the url
        let url_api = window.location.origin + '/api'
        //make a get with fetch
        const resp = await fetch(url_api + '/adopciones/store', {
            method: 'POST',
            body: JSON.stringify({
                mascota_id: this.id_mascota,
                latitud: this.latitud,
                longitud: this.longitud,
                description: this.description,
                direction: this.direction,
            }),
            headers: {
                'Content-Type': 'application/json',
            },
        })

        return resp

        // console.log(data)

    }



}))



Alpine.start()

