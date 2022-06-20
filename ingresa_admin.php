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
    
			<div id="formulario">
<h2>Ingresar:</h2>
<form action="ingresar_admin.php" method="post">
    <!-- probar con usuario: admin / contraseña: admin -->
    <h5>nombre: <input type="text" name="nombre" /></h5>
    <h5>Apellido: <input type="text" name="apellido" /></h5>
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