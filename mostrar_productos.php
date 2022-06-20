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
    include('encabezado.php');
    ?>                        
   
      
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
        require 'productos.php';
include('pagination_class.php')


        


        $base = new Basededatos(SERVIDOR, USUARIO, PASSWORD, BASE);
        $producto = new Productos($base);
        $mostrar_producto = $producto->getProductos();        
        if ($mostrar_producto){ 
            ?>
            <table>
                <tr class="titulos">
                    <td>Registro</td>
                    <td>DNI</td>
                    <td>Apellido</td>
                    <td>Nombre</td>
                    <td colspan="1">Operaciones</td>
                </tr>
            <?php
            for ($i=0;$i<count($mostrar_producto);$i++){
                    echo '<tr>
                            <td>'.$mostrar_producto[$i]['id_insc'].'</td>
                            <td>'.$mostrar_producto[$i]['dni'].'</td>
                            <td>'.$mostrar_producto[$i]['apellido'].'</td>
                            <td>'.$mostrar_producto[$i]['nombre'].'</td>
                            
                        </tr>';
                    
                }
            ?>
        </table>
        <?php } ?>
        <script language="javaScript">
function pagination(page)
{
window.location =
"testpage.php?search_text="+document.form1.search_text.value+"&starting="+page;
}
</script>
<?php
//qry a modificar segun tabla que queremos consultar
$qry = "SELECT * FROM alumnos";
if(isset($_REQUEST['search_text'])){
$searchText = $_REQUEST['search_text'];
$qry .=" where apellido like '$searchText%' OR nombre like '$searchText%'";
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
$obj = new Pagination_class($qry,$base,$starting,$recpage);
$result = $obj->result;
?>
<form name="form1" action="testpage.php" method="POST">
<table border="1" width="40%">
<tr>
 <td colspan="3">
Search <input type="text" name="search_text" value="<?php echo $searchText;?>">
<input type="submit" value="Search">
 </td>
</tr>
<tr><td>Nro.</td><td>Nombre</td><td>Apellido</td></tr>
<?php if(mysqli_num_rows($result)!=0){
    $counter = $starting + 1;
    while($data = mysqli_fetch_array($result)) {?>
    <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $data['nombre']; ?></td>
    <td><?php echo $data['apellido']; ?></td>
    </tr><?php
    $counter ++;
    } ?>
    <tr><td align="center" colspan="3"><?php echo $obj->anchors; ?></td></tr>
    <tr>< td align="center" colspan="3"><?php echo $obj->total; ?></td></tr>
    <?php }else{
    echo "No Data Found";
    }?>
    </td></tr></table></form>



</div>
 </div>


</section>
	<aside>
    
  </aside>
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
           
    </footer>
    
            </header>
                            </body>
    </html>