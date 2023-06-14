function mostrarCreacionCuenta() {
    tipoCuenta = document.getElementById('tipo-cuenta');
    valueTipoCuenta = tipoCuenta.value;
    esconderCreacionCuenta();

    switch (valueTipoCuenta) {
        case "1":
            creacionCliente = document.getElementById('creacionCuentaCliente');
            creacionCliente.style.display = 'flex';
            break;
        case "2":
            creacionAdministrativo = document.getElementById('creacionCuentaAdministrativa');
            creacionAdministrativo.style.display = 'flex';
            break;
    }
}

function esconderCreacionCuenta() {
    creacionCliente = document.getElementById('creacionCuentaCliente');
    creacionAdministrativa = document.getElementById('creacionCuentaAdministrativa');
    creacionCliente.style.display = 'none';
    creacionAdministrativa.style.display = 'none';
}

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
    ids = sacarId(['inputFirstNameCliente', 'inputEmailCliente', 'inputFonoCliente', 'inputImagenCliente']);
    values = ids.map(x => x.value)

    if (values.every(x => x != "")) {
        alert("Se ha creado la cuenta correctamente");
    }
}

function verificarParametrosAdministrativo() {
    ids = sacarId(['inputFirstNameAdministrativo', 'inputLastNameAdministrativo', 'inputEmailAdministrativo', 'inputFonoAdministrativo', 'inputImagenAdministrativo']);
    values = ids.map(x => x.value)

    if (values.every(x => x != "")) {
        alert("Se ha creado la cuenta correctamente");
    }
}