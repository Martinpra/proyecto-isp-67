<?php session_start(); 

?>
<!doctype html>
<html>
<head>
<section id="contenedor">
        <title>ISP67</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" tipe="text/css" href="estilos.css" />
</head>
<body>
       
<?php
    include('encabezado.php');
    ?>                        
    <section id="inicio">
<body>
<main>
	<?php if(isset($_SESSION['dni'])) { 
		$correo=$_SESSION['dni'];
		?>

	<h3>inscripciones del alumno DNI: <?php echo $dni; ?></h3>
	<?php
	include("conexion.php");
	$buscar=mysqli_query($base_datos, "SELECT * FROM alumnos_enfermeria WHERE dni=$dni");

	$mostrar_datos=mysqli_fetch_row($buscar);
	?>
	<ul>
	<li>Nombre: <?php echo $mostrar_datos[1]; ?></li>
	<li>Apellido: <?php echo $mostrar_datos[2]; ?></li>
	<li>Receta: <img src="muestra_insc.php?dni=<?php echo $dni; ?>"></li>
	</ul>

	<p><a href="salir.php">SALIR</a></p>

	<?php 
	} else {
		header('Location:insc_sedes.php');
	}
	?>
</main>
</body>
</html>