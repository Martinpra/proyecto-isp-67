




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