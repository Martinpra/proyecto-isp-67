<?php session_start(); ?>
<!doctype html>
<html>
<head>
<section id="contenedor">
        <title>ISP67</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" tipe="text/css" href="estilos.css" />
</head>
<body>
       
<?php
    include('encabezado.php');
    ?>                        
    <section id="inicio">
		<h1>Catálogo</h1>
	
<?php
	require('clases/pagination_class.php');
	require("clases/BasedeDatosmysqli.php");
	//cambiar la variable conexión a privada para usarla en el carrito
	require("clases/Materias.php");
	require("clases/Inscripcion.php");
    

   $bd = new BasedeDatosmysqli("localhost","root","","isp67");
     $materias = new Materias($bd);
     $insc = new Inscripcion($materias);

     $conexion=$bd->conexion;


?>

<script language="JavaScript">
function pagination(page)
{
	window.location = "ver_materias.php?search_text="+document.form1.search_text.value+"&starting="+page;
}
</script>
<?php
//qry a modificar segun tabla que queremos consultar
$qry = "SELECT * FROM materias";

if(isset($_REQUEST['search_text'])){
	$searchText = $_REQUEST['search_text'];
	$qry .=" WHERE codigo LIKE '%$searchText%' OR nombre LIKE '%$searchText%'";
	}
else{
	$searchText = '';
}

//for pagination
if(isset($_GET['starting'])&& !isset($_REQUEST['submit'])){
	$starting=$_GET['starting'];
}else{
	$starting=0;
}
$recpage = 10;//number of records per page
	
$obj = new Pagination_class($qry,$conexion,$starting,$recpage);		
$result = $obj->result;

		



if(isset($_GET["id"])){
    //Agregar al carrito
    $insc->introduce_materia($_GET["id"]);
    header("Location: ver_materias.php");
}
if(isset($_GET["eliminar"])){
    //Agregar al carrito
    
        $insc->eliminarMateria($_GET["eliminar"]);
    header("Location: ver_materias.php");
}

  //  $datos = $productos->getProductos();
    $datos_insc= $insc->getMateriasInscripcion();


?>	
			
			<h3>Inscripcion</h3>
			<!-- inicia carrito -->
			<table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>comision</th>
                    <th>llamado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach($datos_insc as $k=>$v){
              ?>
                <tr>
                    <td><?php echo $v["codigo"] ?></td>
                    <td><?php echo $v["nombre"] ?></td>
                    <td><?php echo $v["comisión"] ?></td>
                    <td><?php echo $v["llamado"] ?></td>
                    <td><a href="ver_materias.php?eliminar=<?php echo $k?>">Eliminar</a></td>
                </tr>

              <?php                  
            }
        ?>

            </tbody>
        </table>
			<p><a href="fin_inscripcion.php">Finalizar Inscripcion</a></p>

			<?php
			if(isset($_GET['exito'])) {
				echo "<h2>Compra exitosa!</h2>";
			}

			if(isset($_GET['error'])) {
				echo "<h2>Error al enviar el mensaje. Por favor intentelo nuevamente.</h2>";
			}
			?>
			<!-- fin carrito -->

			<h3>Materias</h3>
			<form name="form1" action="ver_materias.php" method="POST">
			
			<table border="1" width="100%">
			<tr>
			  <td colspan="5">
				<input type="text" name="search_text" value="<?php echo $searchText;?>" placeholder="Producto o Descripción">
					<input type="submit" value="Buscar" class="btn_form">
			  </td> 
			</tr>
			<tr>
				<td>numero</td>
                <td>codigo</td>
				<td>Nombre</td>
				<td>comision</td>
				<td>llamado</td>
				<td>Inscribir</td>
			</tr>
			<?php if(mysqli_num_rows($result)!=0){
				$counter = $starting + 1;
				while($data = mysqli_fetch_array($result)) {?>
					<tr>
					<td><?php echo $counter; ?></td>
                    <td><?php echo $data['codigo']; ?></td>
					<td><?php echo $data['nombre']; ?></td>
					<td><?php echo $data['comisión']; ?></td> 
					<td><?php echo $data['llamado']; ?></td>
					<td><a href="ver_materias.php?id=<?php echo $data['id']?>">Inscribir</a></td>                    
					</tr><?php
					$counter ++;
				} ?>
			
					
				<tr><td align="center" colspan="6"><?php echo $obj->anchors; ?></td></tr>
				<tr><td align="center" colspan="6"><?php echo $obj->total; ?></td></tr>
			<?php }else{
				echo "No Data Found";
			}?>
			</td></tr></table>
		</form>


</section>
</main>
</section>
 <footer>
	<div class="footer">
        <?php
    include('pie.php');
    ?>   
            </div>

       
</footer>

        </header>
                        </body>
</html>
