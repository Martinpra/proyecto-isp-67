<?php
include("conexion.php");
$correo=$_GET['dni'];
$buscar_imagen=mysqli_query($base_datos, "SELECT materias FROM inscripcion WHERE dni=$dni");

$mostrar_imagen=mysqli_fetch_row($buscar_imagen);

header("Content-type: $mostrar_imagen[1]");
echo $mostrar_imagen[0];
?>