const countNotification = document.querySelector(".count-notification");
const cuerpoNotification = document.querySelector(".cuerpo-Notificaciones");
var cantNotiMostradas = 0;
axios.get('/mascotas/notifications').then(res => {
    console.log(res.data);
    countNotification.innerHTML = res.data[0];
    cantNotiMostradas = res.data[0];
    cicloNotifications(res.data[1]);
}).catch(error => {
    console.log(error);
    console.log('ouh');
});


Echo.join('alerta-mascota').listen('AlertamascotaEvent', (e) => {
    axios.get('/mascotas/notifications').then(res => {
        countNotification.innerHTML = res.data[0];
        console.log('escuchando');
        // console.log(res.data[1][0]);
        cuerpoNotification.innerHTML = '';
        cicloNotifications(res.data[1]);
    }).catch(error => {
        console.log(error);
    });

}).here((users) => {
    result = users.filter(user => user.id != 9);
    console.log('AQUI');
    result.forEach(u => {
        console.log(u.name);
    });
    console.log('====');
}).joining((user) => {
    console.log('ENTRANDO:');
    console.log(user.name);
    console.log('====');
}).leaving((user) => {
    console.log('SALIENDO:');
    console.log(user.name);
    console.log('====');
});


function cicloNotifications(notifications) {
    notifications.forEach(notificaction => {
        ingresarNotification(notificaction);
    });
}

function ingresarNotification(notification) {
    const plantillaHTML = `<a class = "dropdown-item d-flex align-items-center" href = "#" >
    <div class = "mr-3" ><div class = "icon-circle bg-primary"><i class = "fas fa-file-alt text-white"></i></div></div><div>
    <div class = "small text-gray-500">${notification.created_at}</div>
    <span class = "font-weight-bold">${notification.data.detalle}</span></div>
</a>`;
    cuerpoNotification.insertAdjacentHTML("beforeend", plantillaHTML);
}