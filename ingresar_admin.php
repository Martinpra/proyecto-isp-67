<?php
session_start();
include("password.php");

$clave = $_POST['clave'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$bd=mysqli_connect("localhost", "root", "", "isp67") or die ("Error al conectar con la base de datos");

$consulta=mysqli_query($bd, "SELECT nombre, apellido, password FROM usuarios_sitio WHERE correo='$correo'");

	

$codificado = mysqli_fetch_array($consulta);


$iguales = password_verify($clave, $codificado['password']);



if ($iguales) {
    $_SESSION['correo']= $correo;
    $_SESSION['nombre']= $nombre;
    $_SESSION['apellido']= $apellido;
 header("Location: panel_enfermeria.php");
} else {
 header("Location: insc_sedes.php?error1");
}

?>