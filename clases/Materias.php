<?php
class Materias {
    private $db;
    public function __construct($base){
        $this->db=$base;
    }
    
    public function getMaterias(){
        $respuesta=$this->db->enviarQuery("select * from materias");
		if (!$respuesta and $this->db->error!=''){
		echo $this->db->error; 
		return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}
	public function getMateria($id){
        $respuesta=$this->db->enviarQuery("select * from materias where id=$id");
		if (!$respuesta and $this->db->error!=''){
		echo $this->db->error; 
		return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta[0];
			}
		}
    }
}