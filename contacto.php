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

       <h3>Ingrese sus datos y su consulta</h3>
       <div id="formulario">
       <form method="POST" action="enviar_datos.php">
       <h3>Ingrese nombre:  <input type="text" name="nombre" placeholder="Nombre" required maxlength="30"></h3>
       <h3>Ingrese apellido: <input type="text" name="apellido" placeholder="Apellido" required maxlength="30"></h3>
       <h3>Ingrese correo:<input type="email" name="correo" placeholder="Correo Electronico" required maxlength="30"></h3>
      <h3>motivo de su consulta: </h3>  <select name="motivo">
 
  <option value="administrativa">administrativa</option>
    <option value="inscripciones">inscripciones</option>
</select>
<h3>Su consulta:<textarea  name="consulta" placeholder="consulta" rows='5' maxlength="50"></textarea></h3>
      <input type="submit">
      <?php
        if(isset($_GET['error'])) {   
    ?>
        <h3 style="text-align: center;">El nombre de usuario ya existe, elija otro.</h3>
    <?php
        }
    ?>
     <?php
      if(isset($_GET['ok'])){
      ?>
      <h3>Mensaje enviado</h3>
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
