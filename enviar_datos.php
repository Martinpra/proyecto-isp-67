<?php
$nombre_formu=$_POST['nombre'];
$apellido_formu=$_POST['apellido'];
$correo_formu=$_POST['correo'];
$motivo_formu=$_POST['motivo'];
$mensaje_formu=$_POST['consulta'];
$respuesta_automatica='Su consulta fue recibida, se respondera a la brevedad';
$remitente_respuesta='Area alumnado, Instituto Superior del Profesorado N° 67';



$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $nombre_formu $apellido_formu<$correo_formu>\r\n";
$headers .= "Reply-To: $correo_formu\r\n";

$headers1= "MIME-Version: 1.0\r\n";
$headers1 .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers1 .= "From: Pralong Martin <martinpra@hotmail.com>\r\n";
$headers1 .= "Reply-To: martinpra@hotmail.com\r\n";

$cuerpo_mail='<p><span style="color:purple;">Nombre: </span>'.$nombre_formu."</p><p>Apellido: ".$apellido_formu."</p><p>Edad: ".$edad_formu."</p><p>Correo: ".$correo_formu."</p><p>Motivo: ".$motivo_formu."</p><p>Consulta: ".$mensaje_formu;

$cuerpo_mailresponde='<p><span style="color:red;">Su consulta fue recibida, se respondera a la brevedad</span></p>'.$remitente_respuesta;
mail("martinpra@hotmail.com", "consulta enviada del formulario mi sitio", $cuerpo_mail, $headers);
mail($correo_formu,"Respuesta a su consulta", $cuerpo_mailresponde, $headers1);


header('location: contacto.php?ok');
?>