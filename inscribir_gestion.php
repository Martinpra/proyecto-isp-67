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

$datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");
$rs = mysqli_query($datos_db, "SELECT MAX(id) AS id FROM gestion");
if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);

}

//$headers = "MIME-Version: 1.0\r\n";
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$headers .= "From: $nombre_formu $apellido_formu<$correo_formu>\r\n";
//$headers .= "Reply-To: $correo_formu\r\n";

$headers1= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers1 .= "From: Pralong Martin <martinpra@hotmail.com>\r\n";
$headers1 .= "Reply-To: martinpra@hotmail.com\r\n";

//$cuerpo_mail="<p>Usuario: ".$usuario_formu."</p><p>Clave: ".$clave_formu."</p><p>Nombre: ".$nombre_formu."</p><p>Apellido: ".$apellido_formu."</p><p>Edad: ".$edad_formu."</p><p>Correo: ".$correo_formu."</p><p>Pagina_web: ".$pagina_formu;

$cuerpo_mailresponde="<p>Su Numero de inscripcion es: ".$id."</p><p>Dni: ".$dni_formu."</p><p>Apellido: ".$apellido_formu."</p><p>nombre: ".$nombre_formu."</p><p>".$remitente_respuesta;
//mail("martinpra@hotmail.com", "consulta enviada del formulario mi sitio", $cuerpo_mail, $headers);
mail($correo_formu,"Respuesta a su consulta", $cuerpo_mailresponde, $headers1);

$datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");

$query=mysqli_query($datos_db, "SELECT * FROM gestion WHERE dni='$dni_formu'") or die("error");

$row=mysqli_num_rows($query);

if($row > 0){
    header('location: formu_gestion.php?error');

}

    else{
      mysqli_query($datos_db, "INSERT INTO gestion VALUES (default, '$fecha_hora', '$dni_formu', '$apellido_formu','$nombre_formu', '$direccion_formu', '$correo_formu', '$telefono_formu', $edad_formu, '$fechanac_formu', '$localidad_formu', '$observaciones_formu')");

        //if (mysqli_query($ssql,$datos_db)){ 

            //recibo el último id
            //$ultimo_id = mysqli_insert_id($datos_db); 
           // echo $ultimo_id; 
     //}else{ 
         //   echo "La inserción no se realizó"; 
     //}
     mysqli_close($datos_db);
    
   


            header('location: formu_gestion.php?id');
            header('location: formu_gestion.php?ok');
        };


?>