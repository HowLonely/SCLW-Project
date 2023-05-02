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

function asignarEPPTrabajador() {
    epp = document.getElementById('epp');
    valorEPP = epp.value;

    motivo = document.getElementById('motivo');
    valorMotivo = motivo.value

    if (valorEPP != "" && valorMotivo != "") {
        motivoEPP = '<p>EPP ' + valorEPP + ' asignada por el motivo ' + valorMotivo + '</p>';
        document.getElementById('asignacionesEPPsTrabajador').insertAdjacentHTML('beforeend', motivoEPP);
        agregarEPPTabla(valorEPP);
    }
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

