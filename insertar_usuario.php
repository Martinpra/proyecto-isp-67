<?php
$usuario_formu=$_POST['usuario'];
$clave_formu=$_POST['clave'];
$nombre_formu=$_POST['nombre'];
$apellido_formu=$_POST['apellido'];
$edad_formu=$_POST['edad'];
$correo_formu=$_POST['correo'];
$pagina_formu=$_POST['pagina'];
$respuesta_automatica='Su consulta fue recibida, se respondera a la brevedad';
$remitente_respuesta='Area alumnado, Instituto Superior del Profesorado N° 67';



//$headers = "MIME-Version: 1.0\r\n";
//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
//$headers .= "From: $nombre_formu $apellido_formu<$correo_formu>\r\n";
//$headers .= "Reply-To: $correo_formu\r\n";

$headers1= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers1 .= "From: Pralong Martin <martinpra@hotmail.com>\r\n";
$headers1 .= "Reply-To: martinpra@hotmail.com\r\n";

//$cuerpo_mail="<p>Usuario: ".$usuario_formu."</p><p>Clave: ".$clave_formu."</p><p>Nombre: ".$nombre_formu."</p><p>Apellido: ".$apellido_formu."</p><p>Edad: ".$edad_formu."</p><p>Correo: ".$correo_formu."</p><p>Pagina_web: ".$pagina_formu;

$cuerpo_mailresponde="<p>Su Usuario es: ".$usuario_formu."</p><p>Clave: ".$clave_formu."</p><p>".$remitente_respuesta;
//mail("martinpra@hotmail.com", "consulta enviada del formulario mi sitio", $cuerpo_mail, $headers);
mail($correo_formu,"Respuesta a su consulta", $cuerpo_mailresponde, $headers1);

$datos_db=mysqli_connect("localhost","root", "", "trabajo_final") or die ("no se puede conectar con la base");

$query=mysqli_query($datos_db, "SELECT * FROM usuarios WHERE usuario='$usuario_formu'") or die("error");

$row=mysqli_num_rows($query);

if($row > 0){
    header('location: contacto.php?error');

}

    else{
        mysqli_query($datos_db, "INSERT INTO usuarios VALUES ('$usuario_formu', '$clave_formu','$nombre_formu', '$apellido_formu', $edad_formu, '$correo_formu', '$pagina_formu')");

            mysqli_close($datos_db); 

            
header('location: contacto.php?ok');
        };


?>