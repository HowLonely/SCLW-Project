function aprobado(id) {
    res = confirm("¿Desea aprobar esta solicitud?");
    if (res) {
        respuesta = document.getElementById(id);
        respuesta.innerHTML = '<span class="badge rounded-pill text-bg-success">Aprobado</span>';
        alert("Se ha aprobado la solicitud");
    }
}

function rechazado(id) {
    res = confirm("¿Desea rechazar esta solicitud?");
    if (res) {
        res = document.getElementById(id);
        res.innerHTML = '<span class="badge rounded-pill text-bg-danger">Rechazado</span>';
        alert("Se ha rechazado la solicitud");
    }
}

function aprobado1() {
    aprobado('respuesta1');
}

function rechazado1() {
    rechazado('respuesta1');
}

function aprobado2() {
    aprobado('respuesta2');
}

function rechazado2() {
    rechazado('respuesta2');
}

function aprobado3() {
    aprobado('respuesta3');
}

function rechazado3() {
    rechazado('respuesta3');
}

function deshacer4() {
    res = document.getElementById('respuesta4');
    res.innerHTML = '<span class="badge rounded-pill text-bg-secondary">Pendiente</span>';
}

function deshacer5() {
    res = document.getElementById('respuesta5');
    res.innerHTML = '<span class="badge rounded-pill text-bg-secondary">Pendiente</span>';
}