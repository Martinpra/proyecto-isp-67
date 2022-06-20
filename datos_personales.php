<?php
$dni_formu=$_POST['dni'];
$datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");
$consulta=mysqli_query($datos_db, "SELECT * FROM alumnos_enfermeria WHERE dni='$dni_formu'") or die("error");

    
   while($datos_clases=mysqli_fetch_assoc($consulta)) {
    ?>   
     
            <div id="clases">
 <div id="datos_clases">     
<h2>
<?php echo $datos_clases['dni']; ?>
</h2>
<p>
<?php echo $datos_clases['nombre']; ?>
</p>
<p>
<?php echo $datos_clases['apellido']; ?>
</p>
<p>    
<a href="eliminar_clase.php?id=<?php echo $datos_clases['id_clase']; ?>">Eliminar clase</a>
</p>
</div>
<?php
          }
         ?>  


    
   


