function ocultarSelect() {
    select1 = document.getElementById('select-fecha');
    select2 = document.getElementById('select-faena');
    select3 = document.getElementById('select-trabajador');

    select1.style.display = 'none';
    select2.style.display = 'none';
    select3.style.display = 'none';
}

function cambiardisplay(id) {
    res = document.getElementById(id);
    if (res.style.display == 'none') {
        res.style.display = 'flex';
    } else {
        res.style.displat = 'none';
    }
}

function mostrarSelect() {
    reporte = document.getElementById('select-reporte');
    valueReporte = reporte.value;
    ocultarSelect();
    switch (valueReporte) {
        case '1':
            cambiardisplay('select-fecha');
            break;
        case '2':
            cambiardisplay('select-faena');
            break;
        case '3':
            cambiardisplay('select-trabajador');
            break;
    }
}