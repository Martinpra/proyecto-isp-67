<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ejemplos Unidad 7</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<main class="container">

<section>
		<h1>Comprar</h1>
		<form action="finalizar.php" method="POST">
			<input type="text" name="nombre" placeholder="Nombre">
			<input type="text" name="apellido" placeholder="Apellido">
			<input type="email" name="correo" placeholder="Correo">
			<input type="submit" value="Finalizar compra">
		</form>
</section>
</main>
</body>
</html>