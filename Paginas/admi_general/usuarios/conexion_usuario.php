<?php
function conectar(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "proyecto_trenes_argentinos_x"; //nombre de la base de datos
    $conexion = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    mysqli_select_db($conexion, $dbname);

   return $conexion;
}
?>