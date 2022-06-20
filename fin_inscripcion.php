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
		<h1>Inscripcion</h1>
		<form action="finalizar.php" method="POST">
		<input type="number" name="dni" placeholder="dni">
			<input type="text" name="nombre" placeholder="Nombre">
			<input type="text" name="apellido" placeholder="Apellido">
			<input type="email" name="correo" placeholder="Correo">
			<input type="text" name="telefono" placeholder="Telefono">
			<input type="submit" value="Finalizar compra">
			<?php
        if(isset($_GET['error1'])) {   
    ?>
        <h3 style="text-align: center;">El dni de usuario ya se inscribio.</h3>
    <?php
        }
    ?>
     <?php
      if(isset($_GET['ok'])){
      ?>
      <h3>Su Inscripcion fue realizada</h3>
<?php
      }
      ?>
		</form>
</section>
</main>
</body>
</html>