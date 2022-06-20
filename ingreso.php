<?php
session_start();
include("password.php");
$dni = $_POST['dni'];
$clave = $_POST['clave'];


$bd=mysqli_connect("localhost", "root", "", "isp67") or die ("Error al conectar con la base de datos");

$consulta=mysqli_query($bd, "SELECT password FROM alumnos_enfermeria WHERE dni='$dni'");


$codificado = mysqli_fetch_array($consulta);


$iguales = password_verify($clave, $codificado['clave']);



if ($iguales) {
    $_SESSION['dni']=$dni;
 header("Location: ver_inscripciones.php");
} else {
 header("Location: insc_sedes.php?error1");
}

?>

?>