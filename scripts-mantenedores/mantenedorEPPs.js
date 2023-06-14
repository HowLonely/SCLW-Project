function sacarId(id) {
    if (Array.isArray(id)) {
        ids = id.map(x => document.getElementById(x));
        return ids;
    } else {
        ids = document.getElementById(id);
        return ids;
    }
}

function verificarParametrosEPP() {
    ids = sacarId(['codigo', 'nombre', 'marca', 'stock', 'cargo', 'fotografias']);
    values = ids.map(x => x.value)

    alertFormEPPs = document.getElementById('alert-form-epps');
    alertFormEPPs.innerHTML = ""

    if (values.every(x => x != "")) {
        alert("Se ha ingresado correctamente");
    } else {
        vacios = ids.filter(x => x.value == "").map(x => x.id);
        for (x of vacios) {
            parrafo = '<p>Debe ingresar ' + x + '</p>';
            alertFormEPPs.insertAdjacentHTML('beforeend', parrafo);
        }
    }
    
}

function eliminarEPP() {
    res = confirm("¿Desea eliminar este EPP?");
    if (res) {
        alert("Se ha eliminado el EPP");
    } else {
        alert("No se ha eliminado el EPP");
    }
}
