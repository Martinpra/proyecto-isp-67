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

      <article id="info_catalogo">
 
      <h1>Tecnico Superior en Enfermeria</h1>
        <p>La duración de la carrera es de 3 (tres) años académicos, en caso de realizarla en tiempo y forma.</p> 
        <p>Su objetivo es desarrollar una perspectiva integral del rol de enfermería, consistente en brindar y gestionar el cuidado del sujeto, la familia, el grupo comunidad, para la promoción, prevención, tratamiento, rehabilitación y recuperación hasta el nivel de cuidados intermedios, en el marco de una concepción de Ia Atención Primaria de la Salud como estrategia y Ia clínica ampliada.'; 
        <p>Se cursa en el instituto de Lunes a Viernes en los horarios de 17:45hs a 22:30 hs.
        Y las prácticas profesionalizantes se realizan en efectores de salud por la mañana y tarde'</p>
      
       
<section>
   <nav id="botonera_carrera">
   <ul>
           <li><a href="plan_enfermeria.php">plan de estudio</a></li>
           <li><a href="corre_enfermeria.php">correlatividades</a></li>
          
</ul>
</nav>
<article id="info_catalogo">
<?php
if(isset($_GET['id'])){
switch ($_GET['id']){
case 'plan':
  
   $Imagen='imagenes/planestudio.pdf';
  
break;
   case 'corre':
        $Imagen='imagenes/carrelatividades.pdf';
      
   break;
       
}

?>


<div>
<embed src= ""type="application/pdf" width="100%" height="600px" /><?php echo $Imagen;?>

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

  
       

</article>
     
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



