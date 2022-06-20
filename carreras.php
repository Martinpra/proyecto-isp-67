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

     <h2>NUESTRA OFERTA ACADEMICA</h2>
    <section>
        <nav id="botonera_carrera">
        <ul>
            	<li><a href="carreras.php?id=TSE">Enfermeria</a></li>
                <li><a href="carreras.php?id=TSMEB">Gestion</a></li>
               
</ul>
</nav>
<article id="info_catalogo">
<?php
if(isset($_GET['id'])){
switch ($_GET['id']){
    case 'TSE':
        $Carrera = 'Tecnico Superior en Enfermeria';
        $Duracion = 'La duración de la carrera es de 3 (tres) años académicos, en caso de realizarla en tiempo y forma.';
        $Caracteristicas = 'Desarrollar una perspectiva integral del rol de enfermería, consistente en brindar y gestionar el cuidado del sujeto, la familia, el grupo comunidad, para la promoción, prevención, tratamiento, rehabilitación y recuperación hasta el nivel de cuidados intermedios, en el marco de una concepción de Ia Atención Primaria de la Salud como estrategia y Ia clínica ampliada.'; 
        $cursado = 'Se cursa en el instituto de Lunes a Viernes en los horarios de 17:45hs a 22:30 hs.​
        Y las prácticas profesionalizantes se realizan en efectores de salud por la mañana y tarde';
        $Imagen='enfermeria.png';
       
    break;
        case 'TSMEB':
            $Carrera = 'Tecnicatura Superior en Gestión y Mantenimiento de Equipamiento Biomédico';
            $Duracion = 'La carrera tiene 3 años de duración';
            $Caracteristicas = 'El equipamiento biomédico es todo aquel que se encuentra específicamente en Hospitales, Clínicas, Sanatorios y Centros de salud. ​   
            El equipo biomédico es el equipo electrónico, neumático o hidráulico que monitorea, controla y diagnostica ciertas funciones de los seres humanos. Muchos de ellos se utilizan para mejorar o resguardar la vida.​' ;
            $cursado = 'Se cursa en el instituto de Lunes a Viernes en los horarios de 17:45hs a 22:30 hs.​
             Y las prácticas profesionalizantes se realizan en efectores de salud por la mañana y tarde';
            $Imagen='gestion.png';
           
        break;
            
}

?>

<div id="datos_prod">
   <h3>
   <?php echo $Carrera; ?>
 </h3>
   <h3>
       <?php echo $Duracion; ?>
    </h3>
   <p>
       <?php echo $Caracteristicas; ?>
    </p>
    <p>
       <?php echo $cursado; ?>
    </p>
    <p>
  <li><a href="info_carreras.php?">Mas Informacion</a></li>

    </p>
            </div>

<div id="img_prod">
    <img src="imagenes/<?php echo $Imagen;?>">
</div>

<?php
} else {?>
<div id="catalogo">
  <h3>Seleccione la carrera que desea mas detalle</h3>
  <img src="imagenes/logo nuevo.png" width="200">
  
</div>
<?php
}
?>
</article>
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



