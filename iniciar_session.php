<?php
include("clases/User.php");
include("clases/UserSession.php");


$usersession = new UserSession ();
$user = new User ();


if (isset($_SESSION['user'])){
    echo "hay sesion";

}else if (isset($_POST['correo'], $_POST['clave'])){
    echo "validacion Login";
$passform = $_POST['clave'];
$userform = $_POST['correo'];
if ($user->userExists($userform, $passform)){

   $userSession->setUserCurrent($userform);
   $user->setUser($userform);
   header("Location: panel_sedes.php?verificado");
    
}else{
    echo "nombre de usuario y/o Password incorrectos";
}
}else{
    echo "Login";
    header("Location: panel_sedes.php?verificado");

}



?>