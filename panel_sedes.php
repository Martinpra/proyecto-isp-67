<?php

session_start();
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$datos=$nombre." ".$apellido;

?> 
<!doctype html>
<html>
<head>
<section id="contenedor">
        <title>Isp67</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" tipe="text/css" href="estilos.css" />
</head>
<body>
       
<?php
    include('encabezado.php');
    ?>                        
    <section id="inicio">
    <h3>bienvenido</h3>
    <p> ha realizado la siguiente Inscripcion:<?php echo $nombre ?></p>
    
    <div  id="boton_ins">
<nav id="botonera_inscripcion">
        <ul>
                <li><a href="mostrar_insc_helvecia.php">Sede Helvecia</a></li>
                <li><a href="mostrar_insc_rincon.php">Sede Rincon</a></li>
                <li><a href="panel_materias.php">Materias</a></li>
                <li><a href="panel_alumnos.php">Alumnos</a></li>
                
                               
</ul>
</nav>
</div>
</section>
</section>
 <footer>
	<div class="footer">
        <?php
    include('pie.php');
    ?>   
            </div>

       
</footer>

        </header>
                        </body>
</html>



