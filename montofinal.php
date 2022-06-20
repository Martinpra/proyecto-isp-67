<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="estilos.css">
</head>
 
<body>
<?php
    include('encabezado.php');
    ?>                        
    <section id="inicio">
    <?php
    
    require 'clases/basededatos.php';
    require 'clases/constante.php';
    require 'clases/productos.php';

    $base = new Basededatos(SERVIDOR, USUARIO, PASSWORD, BASE);
    $producto = new Productos($base);

    $mostrar_producto = $producto->getProductos();

	?>
	<table>
		<tr class="titulos">
				<?php
		for($i=0; $i<count($mostrar_producto); $i++) { ?>
					

                        <?php $totales = $mostrar_producto[$i]['stock'] * $mostrar_producto[$i]['valor'];
                         $monto_final += $totales;?>

				
			
		<?php } ?>

        <td align="center" colspan="6">la cantidad de preincripciones es: <?php echo $monto_final; ?></td></tr>
</table>

    </section>			
</article>
        </section>

	
	<aside>
    
  </aside>
	<footer>
	<div class="footer">
        <?php
    include('pie.php');
    ?>   
            </div>
	</footer>
 
</div>
</body>
</html>