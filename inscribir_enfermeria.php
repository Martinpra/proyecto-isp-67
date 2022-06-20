<?php
$dni_formu=$_POST['dni'];
$apellido_formu=$_POST['apellido'];
$nombre_formu=$_POST['nombre'];
$direccion_formu=$_POST['direccion'];
$correo_formu=$_POST['correo'];
$telefono_formu=$_POST['telefono'];
$edad_formu=$_POST['edad'];
$fechanac_formu=$_POST['fechanac'];
$localidad_formu=$_POST['localidad'];
$ingreso_formu=$_POST['ingreso'];
$nacionalidad_formu=$_POST['nacion'];
$lugar_formu=$_POST['lugar'];
$postal_formu=$_POST['postal'];
$observaciones_formu=$_POST['observaciones'];
$password = password_hash($_POST['clave'], PASSWORD_DEFAULT, array('cost'=> 4));
$respuesta_automatica='Su consulta fue recibida, se respondera a la brevedad';
$remitente_respuesta='Area alumnado, Instituto Superior del Profesorado N° 67';

date_default_timezone_set('America/Argentina/Buenos_Aires'); 
setlocale(LC_TIME, 'spanish');
$fecha_hora = date("Y-m-d H:i:s");


$datos_db=mysqli_connect("localhost","root", "", "isp67") or die ("no se puede conectar con la base");

$query=mysqli_query($datos_db, "SELECT * FROM alumnos_enfermeria WHERE dni='$dni_formu'") or die("error");

$row=mysqli_num_rows($query);

if($row > 0){
    header('location: formu_enfermeria.php?error');

}

    else{
        mysqli_query($datos_db, "INSERT INTO alumnos_enfermeria VALUES ('$dni_formu', '$fecha_hora','$apellido_formu','$nombre_formu', '$direccion_formu', '$correo_formu', '$telefono_formu', $edad_formu, '$fechanac_formu', '$localidad_formu', '$ingreso_formu', '$nacionalidad_formu', '$lugar_formu', '$postal_formu', '$observaciones_formu', '$password')");
 mysqli_close($datos_db);

      
      
        
$headers1= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers1 .= "From: Alumnado ISP N°67 <alumnado@institutosuperior67yapeyu.com.ar>\r\n";
$headers1 .= "Reply-To: alumnado@institutosuperior67yapeyu.com.ar\r\n";

$cuerpo_mailresponde="<p>Sus datos de registro para ingresar la pagina de enfermería son: usuario: ".$dni_formu."</p><p>clave: ".$password."</p><p>".$remitente_respuesta;

mail($correo_formu,"Respuesta a su registro", $cuerpo_mailresponde, $headers1);

            header('location: formu_enfermeria.php?id');
            header('location: formu_enfermeria.php?ok');
        };


?>