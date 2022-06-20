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
		<nav id="botonera_carrera">
        <ul>
            	<li><a href="unidad8.php?id=registro">registrarse</a></li>
                <li><a href="unidad8.php?id=ingreso">Ingresar</a></li>
               
</ul>
</nav>
</section>
<section>
       
       <div id="formulario">
       <h2>Ingresar sus datos:</h2>
		<form method="POST" action="registrar.php">
		<h5>Nombre: <input type="text" name="nombre" placeholder="Nombre" required maxlength="100"></h5> 
		<h5>Apellido: <input type="text" name="apellido" placeholder="Apellido" required maxlength="20"></h5>
		<h5>E-mail: <input type="email" name="correo" placeholder="Correo" required maxlength="50"></h5>
		<h5>Contraseña: <input type="password" name="clave" placeholder="Contraseña" required maxlength="60"></h5>
	   <h5> Presionar: <input type="submit" aling="center"></h5>
 
	   <?php
        if(isset($_GET['error'])) {   
    ?>
        <h3 style="text-align: center;">El nombre de usuario ya existe, elija otro.</h3>
    <?php
        }
    ?>
      <h3>
        <?php if(isset($_GET['error1'])) {
            echo "Error al enviar el mensaje. Por favor intentelo nuevamente.";
            }  
            if(isset($_GET['ok'])) {
            echo "Su registro se realizo con exito. Se envio correo con sus datos.";
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