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
      
       <h3>Completar los datos para registrarse como aspirante a la carrera Gestión</h3>
       <div id="formulario">
       <form method="POST" action="inscribir_rincon.php">
     <h5>Ingrese  DNI (sin puntos): <input type="text" name="dni" placeholder="DNI" maxlength='8' required></h5>
     <h5>Ingrese  Apellido: <input type="text" name="apellido" placeholder="Apellido" required maxlength="30"></h5>
     <h5>Ingrese su Nombre: <input type="text" name="nombre" placeholder="Nombre" required maxlength="30"></h5>
      <h5>Ingrese Direccion: <input type="text" name="direccion" placeholder="Direccion" required maxlength="30"></h5>
      <h5>Ingrese Correo: <input type="email" name="correo" placeholder="Correo Electronico" required maxlength="50"></h5>
      <h5>Ingrese Telefono: <input type="text" name="telefono" placeholder="Telefono" required></h5>
      <h5>Ingrese su Edad: <input type="number" name="edad" placeholder="Edad" min="17" max="110" required></h5>
      <h5>Fecha de Nacimiento (99-99-9999): <input type="text" name="fechanac" placeholder="##-##-####" required></h5>
      <h5>Ingrese Localidad: <input type="text" name="localidad" placeholder="Localidad" required maxlength="30"></h5>
      <h5>Si desea agregue algún comentario: <input type="text" name="observaciones" placeholder="Observaciones"  maxlength="50"></h5>
      <input type="submit" value="Pre-inscribirme">
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
      <h3>Su pre_inscripción fue realizada</h3>
      <h3>Su numero de registro es <?php $datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");
       $rs = mysqli_query($datos_db, "SELECT MAX(id_insc) AS id_insc FROM insc_rincon");
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