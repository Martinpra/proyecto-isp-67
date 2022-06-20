<!doctype html>
<html>
<head>
        <title>ISP67</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" tipe="text/css" href="estilos.css" />
</head>
<body>
<section id="contenedor">   
<?php
    include('encabezado.php');
    ?>                        
   <section id="inicio">
		<h2>Registro</h2>

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

  

</div>
 </div>


</section>
 <footer>
			

        <div class="footer">
        <?php
    include('pie.php')
    ?>  
            </div>

       
</footer>

        </header>
                        </body>
</html>
