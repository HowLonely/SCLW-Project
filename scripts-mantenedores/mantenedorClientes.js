function sacarId(id) {
    if (Array.isArray(id)) {
        ids = id.map(x => document.getElementById(x));
        return ids;
    } else {
        ids = document.getElementById(id);
        return ids;
    }
}

function verificarParametrosCliente() {
    ids = sacarId(['nombre', 'rut', 'logo', 'nombre-contacto', 'telefono', 'email', 'foto-contacto']);
    values = ids.map(x => x.value)

    alertFormClientes = document.getElementById('alert-form-clientes');
    alertFormClientes.innerHTML = ""

    if (values.every(x => x != "")) {
        alert("Se ha ingresado correctamente");
    } else {
        vacios = ids.filter(x => x.value == "").map(x => x.id);
        for (x of vacios) {
            parrafo = '<p>Debe ingresar ' + x + '</p>';
            alertFormClientes.insertAdjacentHTML('beforeend', parrafo);
        }
    }
    
}

function eliminarCliente() {
    res = confirm("¿Desea eliminar este cliente?");
    if (res) {
        alert("Se ha eliminado al cliente");
    } else {
        alert("No se ha eliminado al cliente");
    }
}
