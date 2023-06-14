<?php

$server = "localhost";
$user = "user_sclw";
$pass = "sclw_minera";
$db = "minera_sclw";

$connect = @mysqli_connect($server, $user, $pass, $db);

if($connect){
    echo "<div class='alert alert-success'>Conectado Correctamente!!!  que rico, yuhu!!!!</div>";
}else{
    echo "<div class='alert alert-danger'>Error: ".mysqli_connect_error()."</div>";
    //exit();// exit() detiene la ejecución del interprete de php
}

?>