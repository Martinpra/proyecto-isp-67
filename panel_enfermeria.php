<?php

session_start();
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombre'];
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
    include('encabezado.php')
     ?>
        
      <section id="inicio">

     <h2>bienvenido:   <?php echo $nombre. " ".$apellido ?> </h2>
     <section>

     <nav id="botonera_inscripcion">
        <ul>
                <li><a href="panel_materias.php">Materias</a></li>
                <li><a href="rincon.php">Inscripciones</a></li>
                <li><a href="ver_datospersonales.php">datos personales</a></li>
             
                               
</ul>
</nav>

<p>    
<a href="salir.php?id=<?php echo $datos_clases['id_clase']; ?>">salir</a>
</p>
</div>
 </div>
 


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
