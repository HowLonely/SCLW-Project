function tablaEPPTrabajador() {
    trabajador = document.getElementById('trabajador');
    valorTrabajador = trabajador.value;

    tabla = document.getElementById('tablaEPPsTrabajador');

    if (valorTrabajador != "") {
        nombreTrabajador = valorTrabajador
        document.getElementById('nombreTrabajador').innerHTML = nombreTrabajador;
        tabla.style.display = 'block';
    } else {
        tabla.style.display = 'none'
    }
}

function asignarEPPTrabajador(epp, motivo) {
    motivoEPP = '<li class="list-group-item">EPP ' + epp + ' asignado por el motivo ' + motivo + '</li>';
    document.getElementById('asignacionesEPPsTrabajador').insertAdjacentHTML('beforeend', motivoEPP);
    agregarEPPTabla(epp);
}

function agregarEPPTabla(epp) {
    tabla = '<tr><td>123123</td><td>' + epp + '</td><td>asdasd</td><td onclick="eliminarEPP()" class="centrar"><a href="">❌</a></td></tr>';
    document.getElementById('tablaEPP').insertAdjacentHTML('afterend', tabla);
}

function eliminarEPP() {
    res = confirm("¿Desea eliminar la asignación de este EPP?");
    if (res) {
        alert("Se ha eliminado la asignación");
    } else {
        alert("No se ha eliminado la asignación");
    }
}

function displayParametroVacio(parametro, div) {
    if (parametro == '') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
}

function verificarParametros() {
    trabajador = document.getElementById('trabajador');
    valorTrabajador = trabajador.value;

    epp = document.getElementById('epp');
    valorEPP = epp.value;

    motivo = document.getElementById('motivo');
    valorMotivo = motivo.value

    divAlertTrabajador = document.getElementById('alert-trabajador');
    divAlertEPP = document.getElementById('alert-epp');
    divAlertMotivo = document.getElementById('alert-motivo');

    if (valorTrabajador != "" && valorEPP != "" && valorMotivo != "") {
        divAlertTrabajador.style.display = 'none';
        divAlertEPP.style.display = 'none';
        divAlertMotivo.style.display = 'none';
        asignarEPPTrabajador(valorEPP, valorMotivo);
    } else {
        displayParametroVacio(valorTrabajador, divAlertTrabajador);
        displayParametroVacio(valorEPP, divAlertEPP);
        displayParametroVacio(valorMotivo, divAlertMotivo);
    }
}

