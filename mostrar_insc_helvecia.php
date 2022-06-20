<!doctype html>
<html>
<head>
<section id="contenedor">
        <title>isp67</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" tipe="text/css" href="estilos.css" />
</head>
<body>
       
<?php
    include('encabezado.php');
    ?>                        
    <section id="inicio">
        <?php
   include('pagination_class.php');
     $base=mysqli_connect('localhost', 'root', '', 'isp67') or die(mysqli_error());
   ?>
   <script language="javaScript">
function pagination(page)
{
window.location =
"mostrar_insc_helvecia.php?search_text="+document.form1.search_text.value+"&starting="+page;
}
</script>
<?php
//qry a modificar segun tabla que queremos consultar
$qry = "SELECT * FROM insc_helvecia";
if(isset($_REQUEST['search_text'])){
$searchText = $_REQUEST['search_text'];
$qry .=" where dni like '$searchText%' OR apellido like '$searchText%'";
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
<form name="form1" action="mostrar_insc_helvecia.php" method="POST">
<table border="1" width="40%">
<tr>
 <td colspan="6">
Search <input type="text" name="search_text" value="<?php echo $searchText;?>">
<input type="submit" value="Search">
 </td>
</tr>
<tr><td>Nro.</td><td>dni</td><td>Apellido</td><td>Nombre</td><td>direccion</td><td>localidad</td></tr>
<?php if(mysqli_num_rows($result)!=0){
    $counter = $starting + 1;
    while($data = mysqli_fetch_array($result)) {?>
    <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $data['dni']; ?></td>
    <td><?php echo $data['apellido']; ?></td>
    <td><?php echo $data['nombre']; ?></td>
    <td><?php echo $data['direccion']; ?></td>
    <td><?php echo $data['localidad']; ?></td>
    </tr><?php
    $counter ++;
   
    } ?>
     
     <tr><td align="center" colspan="5"><?php echo $obj->anchors; ?></td></tr>
	<tr><td align="center" colspan="5"><?php echo $obj->total; ?></td></tr>
    <?php }else{
    echo "No Data Found";
    }?>
    </td></tr></table>
    </form>

    

</div>
 </div>


 </section>

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
