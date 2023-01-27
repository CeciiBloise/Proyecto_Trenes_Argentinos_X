<?php

/*** VALIDACION DE USUARIO ***/
/* https://www.baulphp.com/niveles-de-usuarios-php-y-mysql-ejemplo-completo/ */

include("Paginas/admi_general/crud_registro_con_imagen/conexion_crud_registro_con_imagen.php");
$conexion=conectar();

//Condicional por si no hay conexion que muestre el error
if(!$conexion){
    die("NO HAY CONEXION" .mysqli_connect_error());
}

//variables que van a recibir valor por teclado para la validacion
$usuario = $_POST["legajo"];
$contraseña = $_POST["contraseñaa"];

session_start();
$_SESSION["legajo"]=$usuario;

//Consulta que le va hacer al SQL, selecciona todo de la tabla login
//y buscara coincidencia entre el usuario y la contrasena ingresados con la tabla del SQL
$sql="SELECT * FROM carga_de_usuarios WHERE legajo = '".$usuario."' and contraseña ='".$contraseña."'";
$query =mysqli_query($conexion,$sql);

//Una vez encontra la coincidencia nos da como resultado una fila, un numero
//$nro = mysqli_num_rows($query);
$nro = mysqli_fetch_array($query); 

//Permite el ingreso o la redirecciona al login

error_reporting(0);
switch ($nro['id_cargo']) {
    
    case null:
        //header("Location: login.php");
        
        echo "LA CONTRASEÑA O USUARIO ES INCORRECTO";
        break;
    case 1:
        header("Location: Paginas\admi_general\Inicio.php");
        //echo "BIENVENIDO" .$usuario;
        break;
    case 2:
       header("Location: Paginas\admi_personal\inicio_admi_personal.php");
        //echo "BIENVENIDO" .$usuario;
        break;
    case 3:
        header("Location: Paginas\mecanico\mecanico.php");
        //echo "BIENVENIDO" .$usuario;
        break;
}

mysqli_free_result($query);
mysqli_close($conexion);
?>