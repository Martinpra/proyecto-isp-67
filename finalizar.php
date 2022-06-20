<!DOCTYPE html>
<html>
<head>
	<title>isp67</title>
</head>
<body>
<?php session_start();
	require("clases/BasedeDatosmysqli.php");
	//cambiar la variable conexión a privada para usarla en el carrito
	require("clases/Materias.php");
	require("clases/Inscripcion.php");
	require ("clases/class.phpmailer.php");
	require ("clases/class.smtp.php");

	$bd = new BasedeDatosmysqli("localhost","root","","isp67");
    $materias = new Materias($bd);
    $inscripcion = new Inscripcion($materias);

    $conexion=$bd->conexion;
    $datos_insc = $inscripcion->getMateriasInscripcion();
    $materias='';
    foreach($datos_insc as $k=>$v){
           $materias.= $v["codigo"]." - ";
           $materias.= $v["nombre"]." - ";
		   $materias.= $v["comisión"]." - ";
         	$materias.= $v["llamado"]."<br>";

                             
            }
	$dni=$_POST['dni'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
    $datos=$nombre." ".$apellido;

	
	
	
	$query=mysqli_query($conexion, "SELECT * FROM inscripcion WHERE dni='$dni'") or die("error");
	
	$row=mysqli_num_rows($query);
	
	if($row > 0){
		header('location: fin_inscripcion.php?error1');
	
	}
	
		else{

    mysqli_query($conexion, "INSERT INTO inscripcion VALUES (DEFAULT, '$materias', '$dni', '$nombre', '$apellido', '$correo','$telefono')");

    		
	$mail = new PHPMailer();
	
			$mail->Mailer = "smtp";
			$mail->SMTPAuth = true;
	
			$mail->SMTPSecure = "tls"; 
			$mail->Host = "smtp.gmail.com"; 
			$mail->Port = 587; // si seteamos SMTPSecure = "ssl"; tenemos que setear Port = 465;
			$mail->Username = "martinpra2408@gmail.com"; // GMAIL username
			$mail->Password = "Martinpra.1979"; // GMAIL password	
		   // $mail->Host = "dtc022.ferozo.com";
		  //  $mail->Username="alumnado@institutosuperior67yapeyu.com.ar";
		  //  $mail->Password = "MartinchO33";
			
					
	$mail->IsHTML(true);
	$mail->From = $correo;
	$mail->FromName = $datos;
	$mail->AddAddress($correo);
	$mail->Subject = "Inscripcion!";
	$mail->Body = "<p>".$nombre." ha realizado la siguiente Inscripcion: </p><p> ".$materias."</p><p>Datos del Alumno: </p><p>".$dni." ".$apellido." ".$nombre."</p><p>Correo: ".$correo."</p><p>Telefono: ".$telefono."</p>";
	$exito=$mail->send();
	
 		if ($exito){	 
 			session_destroy();
			header("Location: panel_materias.php?exito");
 		}
 		else{
 			header("Location: panel_materias.php?error");
 		}
		
	};
	?>
</body>
</html>