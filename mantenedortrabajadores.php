<?php
include("connection.php");

$query = "SELECT nombre, apellido, rut, cargo
          FROM trabajador;";

$resultado = mysqli_query($connect, $query);

if (mysqli_num_rows($resultado) == 0) {
  $trabajadores = "<tr><td colspan='5'>No se han encontrado trabajadores</td></tr>";
} else {
  $trabajadores = "";
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $trabajadores .= "<tr>";
    $trabajadores .= "<td>".$fila['rut']."</td>";
    $trabajadores .= "<td>".$fila['nombre']."</td>";
    $trabajadores .= "<td>".$fila['apellido']."</td>";
    $trabajadores .= "<td>".$fila['cargo']."</td>";
    $trabajadores .= "<td class='centrar'><a data-bs-toggle='collapse' href='' aria-expanded='false' aria-controls='trabajador3' title='Ver detalles'>👁️</a></td>";
    $trabajadores .= "<tr>";
  }
}

if (isset($_POST['boton-ingresar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $rut = $_POST['rut'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];
    $faena = $_POST['faena-actual'];
    $faena_anterior = $_POST['faena-anterior'];
    $foto = $_POST['fotografia'];

    $query = "INSERT INTO trabajador(nombre, apellido, rut, telefono, cargo, fotografia)
                VALUES('".$nombre."', '".$apellido."', '".$rut."', '".$telefono."', '".$cargo."', '".$foto."');";
    
    if (mysqli_query($connect, $query)) {
        $respuesta = "<div class='alert alert-success'>Trabajador ingresado correctamente</div>";
    } else {
        $respuesta = "<div class='alert alert-danger'>No se pudo ingresar al trabajador</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCLW Servicios a la minería</title>
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css"
    />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesMantenedores.css">
</head>
<body data-bs-theme="dark">
    <header>
        <!-- Acá irá el logo de la empresa junto a información    -->
        <img src="./assets/SCLW.png" alt="logo" width="190rem" />
        <!-- Navigator -->
        <nav class="nav">
          <ul class="nav__list">
            <li class="nav__items">
              <a href="./index.html" style="gap: 0.8rem"  id="home-a">
                <i class="fi fi-ss-home" style="background-color: transparent"></i
                >Inicio</a
              >
            </li>
            <li class="nav__items">
              <a href="#"><i class="fi fi-br-edit"></i> Registrar</a>
            </li>
            <li class="nav__items"><a href="mantenedores.html"> <i class="fi fi-sr-cube"></i> Mantenedores</a></li>
            <li class="nav__items"><a href="#"> <i class="fi fi-sr-picture"></i> Galeria</a></li>
          </ul>
        </nav>
        <!-- Formulario de busqueda -->
        <form action="#" class="searchbox">
          <i
            class="fi fi-br-search"
            style="background-color: transparent; display: flex"
          ></i>
          <input
            type="text"
            placeholder="Buscar algo..."
            name="searchbox"
            id="search" 
            class="searchbox__input"
          />
        </form>
        <a href="#" style="background-color: transparent; padding-bottom: 0.8rem; color: #15202B;"><i class="fi fi-ss-user" style="font-size: 1.5rem; background-color: transparent;"></i></a>

      </header>
    <form action="" method="post" enctype="multipart/form-data" class="form-mantenedor">
        <h3>Mantenedor de trabajadores</h3>
        <div class="alinear-divs-form">
            <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre del trabajador" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="apellido">Apellido: </label><input type="text" id="apellido" name="apellido" placeholder="Ingrese apellido del trabajador" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="rut">Rut: </label><input type="text" id="rut" name="rut" placeholder="Ingrese rut del trabajador" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="telefono">Telefono: </label><input type="tel" id="telefono" name="telefono" placeholder="Ingrese telefono del trabajador (9 8880XXXX)" pattern="^[0-9]+" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="cargo">Cargo: </label><input type="text" id="cargo" name="cargo" placeholder="Ingrese cargo del trabajador" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="faena-actual">Faena Actual: </label><input type="text" id="faena-actual" placeholder="Ingrese faena del trabajador" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="faena-anterior">Faena Anterior: </label>
            <select name="faenas" id="faena-anterior" class="select-form">
                <option value="" selected hidden>-</option>
                <option value="1">Faena 1</option>
            </select>
        </div>
        <div class="alinear-divs-form">
            <label for="fotografia">Fotografía: </label><div class="input-file-div"><input type="file" id="fotografia" name="fotografia" class="input-file-examine form-control" value="Examinar"></div>
        </div>
        <div id="div-botones">
            <input type="button" value="Buscar trabajador" id="boton-buscar" name="boton-buscar">
            <input type="submit" value="Ingresar trabajador" id="boton-ingresar" name="boton-ingresar" >
        </div>
        <div>
          <div id="alert-form-trabajadores"></div>
          <?php echo @$respuesta ?>
        </div>
    </form>
    <div>
        <h2>Faena 1</h2>
        <table>
            <thead>
              <tr>
                  <th><h3>Rut</h3></th>
                  <th><h3>Nombre</h3></th>
                  <th><h3>Apellido</h3></th>
                  <th><h3>Cargo</h3></th>
                  <th class="acciones-table"><h3>Acciones</h3></th>
              </tr>
            </thead>
            <tbody>
                  <?php echo @$trabajadores ?>
            </tbody>
        </table>
        <div class="collapse mx-auto my-4 container" id="trabajador1">
          <div class="row">
            <div class="col-md-5 col-12" style="text-align: center;">
              <div class="row">
                <div class="col-12">
                  <img src="assets/prevencionista_profile.png" class="img-thumbnail" alt="..." style="max-width: 200px;">
                </div>
                <div class="col-12">
                  <a href="">Cambiar Fotografía</a>
                </div>
              </div>
            </div>
            <div class="col" style="text-align: left;">
              <h4>Nombre y apellido 1</h4>
              <h4>Rut 1</h4>
              <h5>Cargo 1</h5>
              <div class="row">
                <div class="col-6">
                  <p>Faena 1</p>
                </div>
                <div class="col-6">
                  <p class="fw-light fst-italic">Faena anterior</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse mx-auto my-4 container" id="trabajador2">
          <div class="row">
            <div class="col-md-5 col-12" style="text-align: center;">
              <div class="row">
                <div class="col-12">
                  <img src="assets/prevencionista_profile.png" class="img-thumbnail" alt="..." style="max-width: 200px;">
                </div>
                <div class="col-12">
                  <a href="">Cambiar Fotografía</a>
                </div>
              </div>
            </div>
            <div class="col" style="text-align: left;">
              <h4>Nombre y apellido 2</h4>
              <h4>Rut 2</h4>
              <h5>Cargo 2</h5>
              <div class="row">
                <div class="col-6">
                  <p>Faena 2</p>
                </div>
                <div class="col-6">
                  <p class="fw-light fst-italic">Faena anterior</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h2>Faena 2</h2>
        <table>
            <tr>
                <th><h3>Rut</h3></th>
                <th><h3>Nombre</h3></th>
                <th><h3>Apellido</h3></th>
                <th><h3>Cargo</h3></th>
                <th class="acciones-table"><h3>Acciones</h3></th>
            </tr>
            <tr>
                <td>19231283</td>
                <td>asdasd</td>
                <td>cas</td>
                <td>sdfsfd</td>
                <td class="centrar"><a data-bs-toggle="collapse" href="#trabajador3" aria-expanded="false" aria-controls="trabajador3" title="Ver detalles">👁️</a></td>
            </tr>
            <tr>
                <td>23123123</td>
                <td>sdvcxvcxv</td>
                <td>asd</td>
                <td>sdfsdf</td>
                <td class="centrar"><a data-bs-toggle="collapse" href="#trabajador4" aria-expanded="false" aria-controls="trabajador4" title="Ver detalles">👁️</a></td>
            </tr>
        </table>
        <div class="collapse mx-auto my-4 container" id="trabajador3">
          <div class="row">
            <div class="col-md-5 col-12" style="text-align: center;">
              <div class="row">
                <div class="col-12">
                  <img src="assets/prevencionista_profile.png" class="img-thumbnail" alt="..." style="max-width: 200px;">
                </div>
                <div class="col-12">
                  <a href="">Cambiar Fotografía</a>
                </div>
              </div>
            </div>
            <div class="col" style="text-align: left;">
              <h4>Nombre y apellido 3</h4>
              <h4>Rut 3</h4>
              <h5>Cargo 3</h5>
              <div class="row">
                <div class="col-6">
                  <p>Faena 3</p>
                </div>
                <div class="col-6">
                  <p class="fw-light fst-italic">Faena anterior</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="collapse mx-auto my-4 container" id="trabajador4">
          <div class="row">
            <div class="col-md-5 col-12" style="text-align: center;">
              <div class="row">
                <div class="col-12">
                  <img src="assets/prevencionista_profile.png" class="img-thumbnail" alt="..." style="max-width: 200px;">
                </div>
                <div class="col-12">
                  <a href="">Cambiar Fotografía</a>
                </div>
              </div>
            </div>
            <div class="col" style="text-align: left;">
              <h4>Nombre y apellido 4</h4>
              <h4>Rut 4</h4>
              <h5>Cargo 4</h5>
              <div class="row">
                <div class="col-6">
                  <p>Faena 4</p>
                </div>
                <div class="col-6">
                  <p class="fw-light fst-italic">Faena anterior</p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <footer>
        <div class="footer-logo">
          <img src="./assets/SCLW.png" alt="SCLW logo" width="100rem">
        </div>
          <div class="footer-contact">
            <h3>Contacto</h3>
            <p><i class="fi fi-sr-marker"></i> Av. Los Frutales 1234, La Serena, Chile</p>
            <p><i class="fi fi-sr-phone-call"></i> +51 123456789</p>
            <p><i class="fi fi-sr-envelope"></i> info_contacto@sclw.com</p>
          </div>
      <div class="footer-credits">
        <p>&copy; 2023 SCLW. Todos los derechos reservados.</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="scripts-mantenedores/mantenedorTrabajadores.js"></script>
</body>
</html>
