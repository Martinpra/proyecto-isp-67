<?php
 //$id=$_GET['id'];
//$nro_inscripcion = $_POST['numero'];

$dni_formu=$_POST['dni'];
$apellido_formu=$_POST['apellido'];
$nombre_formu=$_POST['nombre'];
$direccion_formu=$_POST['direccion'];
$correo_formu=$_POST['correo'];
$telefono_formu=$_POST['telefono'];
$edad_formu=$_POST['edad'];
$fechanac_formu=$_POST['fechanac'];
$localidad_formu=$_POST['localidad'];
$observaciones_formu=$_POST['observaciones'];
$respuesta_automatica='Su consulta fue recibida, se respondera a la brevedad';
$remitente_respuesta='Area alumnado, Instituto Superior del Profesorado N° 67';

date_default_timezone_set('America/Argentina/Buenos_Aires'); 
setlocale(LC_TIME, 'spanish');
$fecha_hora = date("Y-m-d H:i:s");

$datos_db=mysqli_connect("localhost","w220226_yapeyu", "MartinchO33", "w220226_isp67") or die ("no se puede conectar con la base");
$rs = mysqli_query($datos_db, "SELECT MAX(id_insc) AS id_insc FROM insc_helvecia");
if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);

}

//$headers = "MIME-Version: 1.0\r\n";
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$headers .= "From: $nombre_formu $apellido_formu<$correo_formu>\r\n";
//$headers .= "Reply-To: $correo_formu\r\n";

$headers1= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers1 .= "From: Alumnado ISP N°67 <alumnado@institutosuperior67yapeyu.com.ar>\r\n";
$headers1 .= "Reply-To: alumnado@institutosuperior67yapeyu.com.ar\r\n";


$cuerpo_mailresponde="<p>Su Numero de inscripción es: ".$id."</p><p>Dni: ".$dni_formu."</p><p>Apellido: ".$apellido_formu."</p><p>nombre: ".$nombre_formu."</p><p>".$remitente_respuesta;

mail($correo_formu,"Respuesta a su consulta", $cuerpo_mailresponde, $headers1);

$datos_db=mysqli_connect("localhost","w220226_yapeyu", "MartinchO33", "w220226_isp67") or die ("no se puede conectar con la base");

$query=mysqli_query($datos_db, "SELECT * FROM insc_helvecia WHERE dni='$dni_formu'") or die("error");

$row=mysqli_num_rows($query);

if($row > 0){
    header('location: helvecia.php?error');

}

    else{
      mysqli_query($datos_db, "INSERT INTO insc_helvecia VALUES (default, '$fecha_hora', '$dni_formu', '$apellido_formu','$nombre_formu', '$direccion_formu', '$correo_formu', '$telefono_formu', $edad_formu, '$fechanac_formu', '$localidad_formu', '$observaciones_formu')");

      
     mysqli_close($datos_db);
    
   


            header('location: helvecia.php?id');
            header('location: helvecia.php?ok');
        };


?>