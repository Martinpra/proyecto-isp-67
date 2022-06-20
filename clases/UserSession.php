<?php
class UserSession {
	

    public function __construct(){
        session_start();
	}

    public function setCurentUser($user){
		$_SEESION['nombre'] = $user;	
	}

    public function getCurentUser($user){
		return $_SESSION['nombre'];	
	}

    public function closeSession($user){
		session_unset();
        session_destroy();	
	}
}
	?>