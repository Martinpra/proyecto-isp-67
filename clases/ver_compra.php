<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
 
<div class="container">
	<header>
		<h1>Programación en PHP y MySQL - Nivel Avanzado</h1>
	
        <nav>
		<?php include("botonera.php"); ?>
	</nav>
      
	</header>
	<section>
      <nav id="botonera_producto">
        <ul>
            	<li><a href="ver_compra.php">Ver Compras</a></li>
                <li><a href="mostrar_productos.php">Ver Productos</a></li>
               
</ul>
</nav>
</section>
		<section>
        <?php 
        require 'basededatos.php';
        require 'constante.php';
        require 'compras.php';

        $base = new Basededatos(SERVIDOR, USUARIO, PASSWORD, BASE);
        $compra = new Compras($base);
        $mostrar_compra = $compra->getCompras();        
        if ($mostrar_compra){ 
            ?>
            <table>
                <tr class="titulos">
                    <td>Código</td>
                    <td>Producto</td>
                    <td>Descripcion</td>
                    <td>Precio</td>
                    <td colspan="1">Operaciones</td>
                </tr>
            <?php
            for ($i=0;$i<count($mostrar_compra);$i++){
                    echo '<tr>
                            <td>'.$mostrar_compra[$i]['codigo'].'</td>
                            <td>'.$mostrar_compra[$i]['nombre'].'</td>
                            <td>'.$mostrar_compra[$i]['descripcion'].'</td>
                            <td>'.$mostrar_compra[$i]['precio'].'</td>
                            <td><a href="eliminar_compra.php?codigo='.$mostrar_compra[$i]['codigo'].'"><button type="button" class="btn btn-info">Eliminar</button></a></td>
                            
                        </tr>';
                    
                }
            ?>
        </table>
        <?php } ?>
</div>
 </div>


</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>