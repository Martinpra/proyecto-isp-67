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
    <?php           
   date_default_timezone_set('America/Argentina/Buenos_Aires'); 
setlocale(LC_TIME, 'spanish');
$fecha_hora = date("d-m-Y H:i:s");
?>  
   <section id="inicio">
      
       <h3>Completar los datos para inscribirse</h3>
       <div id="formulario">
       <form method="POST" action="inscribir_gestion.php">
     <h5>Ingrese su DNI: <input type="text" name="dni" placeholder="DNI" maxlength='8' required></h5>
     <h5><input type="datetime" name="fecha_hora" placeholder="<?php echo $fecha_hora;?>"></h5>
     <h5>Ingrese su Apellido: <input type="text" name="apellido" placeholder="Apellido" required maxlength="30"></h5>
     <h5>Ingrese su Nombre: <input type="text" name="nombre" placeholder="Nombre" required maxlength="30"></h5>
      <input type="text" name="direccion" placeholder="Direccion" required maxlength="30">
      <input type="email" name="correo" placeholder="Correo Electronico" required maxlength="30">
      <input type="text" name="telefono" placeholder="Telefono" required>
      <input type="number" name="edad" placeholder="Edad" min="17" max="110" required>
      <input type="date" name="fechanac" placeholder="Fecha de Nacimiento" required>
      <input type="text" name="localidad" placeholder="Localidad" required maxlength="30">
      <input type="text" name="observaciones" placeholder="Observaciones"  maxlength="50">
      <input type="submit" value="Inscribirme">
      <?php
        if(isset($_GET['error'])) {   
    ?>
        <h3 style="text-align: center;">El dni de usuario ya existe.</h3>
    <?php
        }
    ?>
     <?php
      if(isset($_GET['ok'])){
      ?>
      <h3>Su inscripcion fue realizada</h3>
      <h3>Su numero de para el sorteo es <?php $datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");
       $rs = mysqli_query($datos_db, "SELECT MAX(id) AS id FROM gestion");
      if ($row = mysqli_fetch_row($rs)) {
      $id = trim($row[0]);
      echo $id;
      }
      ?>
      </h3>
      <?php
      }
      ?>
      </form>
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