<?php
class BasedeDatosmysqli{
	public $conexion;
	public $error;
	
	public function __construct($servidor,$usuario,$password,$base){

		if (!$this->_connect($servidor,$usuario,$password,$base)){
			$this->error = $this->conexion->connect_error;
		}
		$this->setNames();
	}
	
	public function __destruct(){
		$this->conexion->close();
	}
	
	public function _connect($servidor,$usuario,$password,$base){
		$this->conexion = new mysqli($servidor,$usuario,$password,$base);
		if (!$this->conexion->connect_errno){
			$this->error = $this->conexion->connect_error;
			return false;
		}
		
	}

	private function setNames(){
		$this->conexion->query('SET NAMES utf8');		
	}
	
	public function enviarQuery($query){
		$tipo = strtoupper(substr($query,0,6));
		
		switch ($tipo){
			case 'SELECT':
				$resultado = $this->conexion->query($query);
				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
					if ($this->conexion->affected_rows == 0){
						return false;
					}
					else{
						while ($fila = $resultado->fetch_assoc()){
							$array_resultado[] = $fila;
						}
						return $array_resultado;
					}
				}
				break;
			case 'INSERT':
				$resultado = $this->conexion->query($query);
				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
					return $this->conexion->insert_id;
				}
				break;
			case 'UPDATE':				
			case 'DELETE':
				$resultado = $this->conexion->query($query);
				if (!$resultado){
					$this->error = $this->conexion->error;
					return false;
				}
				else{
					return $this->conexion->affected_rows;
				}		
				break;
			default:
				$this->error = "Tipo de consulta no permitida";
		}
	}
	
}
?>