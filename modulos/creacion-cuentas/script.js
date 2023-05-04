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