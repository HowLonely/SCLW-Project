<?php
include("connection.php");

$query = "SELECT id, nombre, rut, nombre_contacto, telefono_contacto, email_contacto
          FROM cliente;";

$resultado = mysqli_query($connect, $query);

if (mysqli_num_rows($resultado) == 0) {
  $clientes = "<tr><td colspan='5'>No se han encontrado clientes</td></tr>";
} else {
  $clientes = "";
  while ($fila = mysqli_fetch_assoc($resultado)) {
    $clientes .= "<tr>";
    $clientes .= "<td>".$fila['rut']."</td>";
    $clientes .= "<td>".$fila['nombre']."</td>";
    $clientes .= "<td>".$fila['nombre_contacto']."</td>";
    $clientes .= "<td>".$fila['telefono_contacto']."</td>";
    $clientes .= "<td class='centrar'><a href='mailto: ".$fila['email_contacto']."' title='Enviar Correo'>📧</a> <a href='mantenedorclientes.php?id=".$fila['id']."' title='Ver detalles'>👁️</a></td>";
    $clientes .= "<tr>";
  }
}

if (isset($_POST['boton-ingresar'])) {
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $nombreLogo = $_FILES['logo']['name'];
    $tipoLogo = $_FILES['logo']['type'];
    $tamanioLogo = $_FILES['logo']['name'];
    $nombreTempLogo = $_FILES['logo']['name'];
    $rutaLogo = "assets/logos/";
    $nombre_contacto = $_POST['nombre-contacto'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $nombreFoto = $_FILES['foto-contacto']['name'];
    $tipoFoto = $_FILES['foto-contacto']['type'];
    $tamanioFoto = $_FILES['foto-contacto']['size'];
    $nombreTempFoto = $_FILES['foto-contacto']['tmp_name'];
    $rutaFoto = "assets/clientes/";

    if (($nombreLogo == !NULL) && ($tamanioLogo <= 3000000)) {
      if (($tipoLogo == "image/png") || ($tipoLogo == "image/gif") || ($tipoLogo == "image/jpg") || ($tipoLogo == "image/jpeg")) {
          $nuevoNombreLogo = "logoEmpresa".$id.".png";
          //subir la foto al server
          move_uploaded_file($nombreTempLogo,$rutaLogo.$nombreNuevoLogo);
      }else{
          $nuevoNombreLogo = "defaultLogo.png";    
          $respuesta = "El formato del logo no esta permitido, no se registrará la imagen";
      }
    }else{
      $nuevoNombreLogo = "defaultLogo.png";
      $respuesta = "El tamaño del logo supera el máximo permitido, no se registrará la imagen";
    }

    if (($nombreFoto == !NULL) && ($tamanioFoto <= 3000000)) {
      if (($tipoFoto == "image/png") || ($tipoFoto == "image/gif") || ($tipoFoto == "image/jpg") || ($tipoFoto == "image/jpeg")) {
          $nuevoNombreFoto = "cliente".$id.".png";
          //subir la foto al server
          move_uploaded_file($nombreTempFoto,$rutaFoto.$nombreNuevoFoto);
      }else{
          $nuevoNombreFoto = "default.png";    
          $respuesta = "El formato de la foto no esta permitido, no se registrará la imagen";
      }
    }else{
      $nuevoNombreFoto = "default.png";
      $respuesta = "El tamaño de la foto supera el máximo permitido, no se registrará la imagen";
    }

    $query = "INSERT INTO cliente(nombre, rut, logo, nombre_contacto, telefono_contacto, email_contacto, fotografia_contacto)
                VALUES('".$nombre."', '".$rut."', '".$nuevoNombreLogo."', '".$nombre_contacto."', '".$telefono."', '".$email."', '".$nuevoNombreFoto."');";
    if (mysqli_query($connect, $query)) {
        $respuesta = "<div class='alert alert-success'>Cliente ingresado correctamente</div>";
    } else {
        $respuesta = "<div class='alert alert-danger'>No se pudo ingresar al cliente</div>";
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
        <h3>Mantenedor de clientes</h3>
        <div class="alinear-divs-form">
            <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" placeholder="Ingrese nombre del cliente" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="rut">Rut: </label><input type="text" id="rut" name="rut" placeholder="Ingrese rut del cliente" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="logo">Logo: </label><div class="input-file-div"><input type="file" id="logo" name="logo" class="input-file-examine form-control" value="Examinar"></div>
        </div>
        <div class="alinear-divs-form">
            <label for="nombre-contacto">Nombre Contacto: </label><input type="text" id="nombre-contacto" name="nombre-contacto" placeholder="Ingrese nombre del contacto" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="telefono">Telefono Contacto: </label><input type="tel" id="telefono" name="telefono" pattern="^[0-9]+" placeholder="Ingrese telefono del contacto (9 8880XXXX)" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="email">Email Contacto: </label><input type="email" id="email" name="email" placeholder="Ingrese email del contacto" class="inputs-form">
        </div>
        <div class="alinear-divs-form">
            <label for="foto-contacto">Fotografía: </label><div class="input-file-div"><input type="file" id="foto-contacto" name="foto-contacto" class="input-file-examine form-control" value="Examinar"></div>
        </div>
        <div id="div-botones">
            <input type="button" value="Buscar cliente" id="boton-buscar" name="boton-buscar">
            <input type="submit" value="Ingresar cliente" id="boton-ingresar" name="boton-ingresar" onclick="verificarParametrosCliente()">
        </div>
        <div>
          <div id="alert-form-clientes"></div>
          <?php @$respuesta ?>
        </div>
    </form>
    <div>
        <h2>Listado Clientes</h2>
        <table>
            <thead>
                <tr>
                    <th><h3>Rut</h3></th>
                    <th><h3>Nombre</h3></th>
                    <th><h3>Contacto</h3></th>
                    <th><h3>Telefono</h3></th>
                    <th class="acciones-table"><h3>Acciones</h3></th>
                </tr>
            </thead>
            <tbody>
                <?php echo @$clientes ?>
            </tbody>
        </table>
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
    <script src="scripts-mantenedores/mantenedorClientes.js"></script>
</body>
</html>
