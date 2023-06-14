ocultarSelect(); //Funcion limpieza

function ocultarSelect() {
  select1 = document.getElementById("select-historico");
  select2 = document.getElementById("select-fecha");
  select3 = document.getElementById("select-faena");
  select4 = document.getElementById("select-trabajador");

  select1.style.display = "none";
  select2.style.display = "none";
  select3.style.display = "none";
  select4.style.display = "none";
}

function cambiardisplay(id) {
  res = document.getElementById(id);
  if (res.style.display == "none") {
    res.style.display = "flex";
  } else {
    res.style.displat = "none";
  }
}

function compararFechas() {
  alertFecha = document.getElementById('alert-fecha');
  alertFecha.style.display = 'none';
  fechaInicio = document.getElementById('fecha-inicio');
  valueFechaInicio = fechaInicio.value;
  fechaTermino = document.getElementById('fecha-termino');
  valueFechaTermino = fechaTermino.value;
  
  if (valueFechaInicio > valueFechaTermino) {
    alertFecha.style.display = 'flex';
  }
}

function mostrarSelect() {
  reporte = document.getElementById("select-reporte");
  valueReporte = reporte.value;
  ocultarSelect();
  switch (valueReporte) {
    case "1":
      cambiardisplay("select-historico");
      break;
    case "2":
      cambiardisplay("select-fecha");
      break;
    case "3":
      cambiardisplay("select-faena");
      break;
    case "4":
      cambiardisplay("select-trabajador");
      break;
  }
}
