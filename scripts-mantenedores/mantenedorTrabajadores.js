function sacarId(id) {
    if (Array.isArray(id)) {
        ids = id.map(x => document.getElementById(x));
        return ids;
    } else {
        ids = document.getElementById(id);
        return ids;
    }
}

function verificarParametrosTrabajador() {
    ids = sacarId(['nombre', 'apellido', 'rut', 'telefono', 'cargo', 'faena-actual', 'fotografia']);
    values = ids.map(x => x.value)

    alertFormTrabajadores = document.getElementById('alert-form-trabajadores');
    alertFormTrabajadores.innerHTML = ""

    if (values.every(x => x != "")) {
        alert("Se ha ingresado correctamente");
    } else {
        vacios = ids.filter(x => x.value == "").map(x => x.id);
        for (x of vacios) {
            parrafo = '<p>Debe ingresar ' + x + '</p>';
            alertFormTrabajadores.insertAdjacentHTML('beforeend', parrafo);
        }
    }
    
}

function eliminarTrabajador() {
    res = confirm("¿Desea eliminar este trabajador?");
    if (res) {
        alert("Se ha eliminado al trabajador");
    } else {
        alert("No se ha eliminado al trabajador");
    }
}
