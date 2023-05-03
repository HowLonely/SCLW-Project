function aprobado(id, idAprobar, idRechazar) {
    res = confirm("¿Desea aprobar esta solicitud?");
    if (res) {
        respuesta = document.getElementById(id);
        respuesta.innerHTML = '<span class="badge rounded-pill text-bg-success">Aprobado</span>';
        alert("Se ha aprobado la solicitud");
        deshabilitarBotones(idAprobar, idRechazar);
    }
}

function rechazado(id, idAprobar, idRechazar) {
    res = confirm("¿Desea rechazar esta solicitud?");
    if (res) {
        res = document.getElementById(id);
        res.innerHTML = '<span class="badge rounded-pill text-bg-danger">Rechazado</span>';
        alert("Se ha rechazado la solicitud");
        deshabilitarBotones(idAprobar, idRechazar);
    }
}

function deshabilitarBotones(aprobar, rechazar) {
    botonAprobar = document.getElementById(aprobar);
    botonAprobar.innerHTML = '<button type="button" class="btn btn-outline-success" disabled>Aprobar</button>';
    botonRechazar = document.getElementById(rechazar);
    botonRechazar.innerHTML = '<button type="button" class="btn btn-outline-danger" disabled>Rechazar</button>';
}

function aprobado1() {
    aprobado('respuesta1', 'aprobar1', 'rechazar1');
}

function rechazado1() {
    rechazado('respuesta1', 'aprobar1', 'rechazar1');
}

function aprobado2() {
    aprobado('respuesta2', 'aprobar2', 'rechazar2');
}

function rechazado2() {
    rechazado('respuesta2', 'aprobar2', 'rechazar2');
}

function aprobado3() {
    aprobado('respuesta3', 'aprobar3', 'rechazar3');
}

function rechazado3() {
    rechazado('respuesta3', 'aprobar3', 'rechazar3');
}
