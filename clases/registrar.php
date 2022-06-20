<?php
    
$correo_formu=$_POST['correo'];
$nombre_formu=$_POST['nombre'];
$apellido_formu=$_POST['apellido'];
$password = password_hash($_POST['clave'], PASSWORD_DEFAULT, array('cost'=> 4));
$datos = $nombre_formu. " ".$apellido_formu;
$respuesta_automatica='Su consulta fue recibida, se respondera a la brevedad';
$remitente_respuesta='Area alumnado, Instituto Superior del Profesorado N° 67';
	



//require ("includes/class.phpmailer.php");
//require ("includes/class.smtp.php");		
//$mail = new PHPMailer();

//$mail->Mailer = "smtp";
//$mail->SMTPAuth = true;
/*		
//HOTMAIL	
$mail->SMTPSecure = "tls"; // sets the prefix to the servier
$mail->Host = "smtp.live.com"; // sets HOTMAIL as the SMTP server
$mail->Port = 25; // alternate is "26" - set the SMTP port for the HOTMAIL server
$mail->Username = "usuario@hotmail.com"; // HOTMAIL username
$mail->Password = "password"; // HOTMAIL password		
*/
/*		
//GMAIL	
$mail->SMTPSecure = "tls"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 587; // si seteamos SMTPSecure = "ssl"; tenemos que setear Port = 465;
$mail->Username = "usuario@gmail.com"; // GMAIL username
$mail->Password = "password"; // GMAIL password		
*/
//Cualquier otro servidor	




$datos_db=mysqli_connect("localhost","root", "", "php_avanzado") or die ("no se puede conectar con la base");

$query=mysqli_query($datos_db, "SELECT * FROM usuarios_sitio WHERE correo='$correo_formu'") or die("error");

$row=mysqli_num_rows($query);

if($row > 0){
    header('location: unidad8.php?error');

}

    else{
        mysqli_query($datos_db, "INSERT INTO usuarios_sitio VALUES ('$correo_formu', '$nombre_formu','$apellido_formu', '$password')");

            mysqli_close($datos_db); 

            require ("includes/class.phpmailer.php");
            require ("includes/class.smtp.php"); 
        		
            
                    $mail = new PHPMailer();
            
                    $mail->Mailer = "smtp";
                    $mail->SMTPAuth = true;
            
                    $mail->SMTPSecure = "tls"; 
                    $mail->Host = "smtp.gmail.com"; 
                    $mail->Port = 587; // si seteamos SMTPSecure = "ssl"; tenemos que setear Port = 465;
                    $mail->Username = "martinpra2408@gmail.com"; // GMAIL username
                    $mail->Password = "**********"; // GMAIL password	
                   // $mail->Host = "dtc022.ferozo.com";
                  //  $mail->Username="alumnado@institutosuperior67yapeyu.com.ar";
                  //  $mail->Password = "MartinchO33";
                    
                    $mail->IsHTML(true);
                    $mail->From = $correo_formu;
                    $mail->FromName = $datos;
                    $mail->AddAddress($correo_formu);
                    $mail->Subject = "Datos de su registro";
                    $mail->Body = "<p>".$_POST['nombre']." Su nombre de usuario es: ".$_POST['correo']."</p><p>Su Clave de ingreso es: ".$_POST['clave']."</p>".$remitente_respuesta;
                    $exito=$mail->send();
                
                     if ($exito){	
                        header("Location: formu_registro.php?ok");
                    } else {
                     header("Location: formu_registro.php?error1");
                    }
                    
             

            

        };


?>