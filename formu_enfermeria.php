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
      
       <h3>Completar los datos para registrarse como alumno de la carrera Enfermería</h3>
       <div id="formulario">
       <form method="POST" action="inscribir_enfermeria.php">
     <h5>Ingrese  DNI (sin puntos): <input type="text" name="dni" placeholder="DNI" maxlength='8' required></h5>
     <h5>Ingrese  Apellido: <input type="text" name="apellido" placeholder="Apellido" required maxlength="30"></h5>
     <h5>Ingrese su Nombre: <input type="text" name="nombre" placeholder="Nombre" required maxlength="30"></h5>
      <h5>Ingrese Direccion: <input type="text" name="direccion" placeholder="Direccion" required maxlength="30"></h5>
      <h5>Ingrese Correo: <input type="email" name="correo" placeholder="Correo Electronico" required maxlength="60"></h5>
      <h5>Ingrese Telefono: <input type="text" name="telefono" placeholder="Telefono" required></h5>
    <h5>Fecha de Nacimiento (99-99-9999): <input type="text" name="fechanac" placeholder="##-##-####" required></h5>      
<h5>Ingrese su Edad: <input type="number" name="edad" placeholder="Edad" min="17" max="110" required></h5>
  
      <h5>Ingrese Localidad: <input type="text" name="localidad" placeholder="Localidad" required maxlength="30"></h5>
<h5>año de ingreso: <input type="text" name="ingreso" placeholder="Año de Ingreso"  maxlength='4' required> </h5>
 <h5>Nacionalidad: <input type="text" name="nacion" placeholder="Nacionalidad" required maxlength="30">
 <h5>Lugar de nacimiento: <input type="text" name="lugar" placeholder="Lugar de Nacimiento" required maxlength="50">
 <h5>Codigo Postal: <input type="text" name="postal" placeholder="Código Postal" required maxlength="4">
      <h5>Si desea agregue algún comentario: <input type="text" name="observaciones" placeholder="Observaciones"  maxlength="50"></h5>
<h5>Contraseña: <input type="password" name="clave" placeholder="Contraseña" required maxlength="60"></h5>
      <input type="submit" value="Registrame">
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
      <h3>Su registro fue realizado</h3>
<?php
      }
      ?>
        </form>
</section>
</section>
 <footer>