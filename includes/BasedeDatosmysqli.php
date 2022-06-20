<?php
class DB{
	private $host;
	private $db;
	private $user;
	private $password;



	public function __construct(){
		$this->host = 'localhost'; 
		$this->db = 'isp67'; 
		$this->user = 'root'; 
		$this->password ='';
		
   }

	public function _connect(){
		try {
$connection = "mysql:host=" . $this->host . ";dbname=" .$this->db;
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false];

			$pdo = new PDO ($conection, $this->user, $this->password, $options);
		}catch(PDOexeption $e){
			print_r("Error connection: " . $e->getmessage());

		}
	}
}

?>