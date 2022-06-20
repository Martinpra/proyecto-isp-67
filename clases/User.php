<?php

include("clases/BasedeDatosmysqli.php");
class User extends DB{
	private $nombre;
	private $username;

    public function UserExists($user, $pass){
    $md5pass = md5 ($pass);
    
    $query = $this->connect()->prepare('SELECT * FROM usuario_sitio WHERE correo = :user AND password = :pass');
    $query->execute(['user'=> $user, 'pass'=> $md5pass]);
    if($query->rowcount()){

        return true;
    }else {
        return false;
    }
    }

    public function setUser($user){
	$query = $this->connect()->prepare('SELECT * FROM usuario_sitio WHERE correo= :user');
    $query->execute(['user'=> $user]);	
    foreach ($query as $currentUser){
        $this->$nombre = $currentUser['nombre'];
        $this->$correo = $currentUser['correo'];

       

            }
	}

    public function getNombre(){
		return $this->nombre;	
	}

  
	}
    ?>