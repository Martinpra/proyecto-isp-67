<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
	

	<nav>
		<?php include("botonera.php"); ?>
	</nav>
	</header>
	<section>
		<h2>Registro</h2>
		<section>
        <nav id="botonera_carrera">
        <ul>
            	<li><a href="unidad8.php?id=registro">registrarse</a></li>
                <li><a href="unidad8.php?id=ingreso">Ingresar</a></li>
               
</ul>
</nav>


</section>
	<section>
			<div id="formulario">
<h2>Ingresar:</h2>
<form action="ingreso.php" method="post">
    <!-- probar con usuario: admin / contraseña: admin -->
    <h5>Usuario: <input type="email" name="correo" /></h5>
    <h5>Password: <input type="password" name="clave" /></h5>    
    <input type="submit" name="ingresar" value="Ingresar" />
    <h3>
        <?php if(isset($_GET['error1'])) {
            echo "Contraseña incorrecta";
            }  
            if(isset($_GET['verificado'])) {
            echo "Contraseña verificada!";
            } ?>
    </h3>
</form>

</section>		
</article>
      

	</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>