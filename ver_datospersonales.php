<?php

session_start();
$correo = $_SESSION['correo'];
$clave = $_SESSION['clave'];
$apellido = $_SESSION['apellido']


?>

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
		<section>
    <h4>datos personales</h4>
   <?php
    $bd=mysqli_connect("localhost", "root", "", "isp67") or die ("Error al conectar con la base de datos");

    $consulta=mysqli_query($bd, "SELECT nombre, apellido, FROM usuarios_sitio WHERE correo='$correo' and clave='$clave'");
    
  

        ?>   
         
             
   <h2>
   <?php echo $consulta['nombre']; ?>
</h2>
<p>
<?php echo $consulta['apellido']; ?>
</p>
<p>    
<a href="eliminar_clase.php?id=<?php echo $datos_clases['id_clase']; ?>">Eliminar clase</a>
</p>

 

</section>
    
        </section>
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
