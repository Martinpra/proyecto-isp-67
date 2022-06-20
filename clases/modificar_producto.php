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
    <?php
	 require 'basededatos.php';
     require 'constante.php';
     require 'productos.php';
     require 'compras.php';

	$base = new Basededatos(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Productos($base);

	$productomodif = $producto->getProducto($_GET['codigo']);

    if ($productomodif){ 
        ?>
        <table>
            <tr class="titulos">
                <td>Código</td>
                <td>Producto</td>
                <td>Descripcion</td>
                <td>Precio</td>
                <td colspan="2">Operaciones</td>
                </tr>
        <?php
      
                echo '<tr>
                        <td>'.$productomodif[0]['codigo'].'</td>
                        <td>'.$productomodif[0]['producto'].'</td>
                        <td>'.$productomodif[0]['descripcion'].'</td>
                        <td>'.$productomodif[0]['precio'].'</td>
                                           
                        
                        <td><a href="unidad7.php"><button type="button" class="btn btn-info">cancelar</button></a></td>
                      
                        </tr>';
                
           
        ?>
    </table>
    <?php } ?>
	
	
	<form action="alta_productos.php" method="POST">
		<input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
    	<input type="hidden" placeholder="Nombre" name="nombre" value="<?php echo $productomodif[0]['producto'];?>">
   	 	<input type="hidden" placeholder="Descripcion" name="descripcion" value="<?php echo $productomodif[0]['descripcion'];?>">
    	<input type="hidden" placeholder="Precio" name="precio" value="<?php echo $productomodif[0]['precio'];?>">
    		<input type="submit" value="Confirmar Compra del Producto">

	</form>
	


</section>
	<aside>
    
  </aside>
	<footer>
		<a href="https://site.elearning-total.com/courses/?com=lb">Programación en PHP y MySQL - Nivel Avanzado</a>
	</footer>
 
</div>
</body>
</html>