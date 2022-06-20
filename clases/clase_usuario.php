<?php
class Alumno{
private $db;  



public function __construct($base){
$this->db = $base;
}


public function insertarAlumno($dni,$nombre,$descripcion,$precio){
    $respuesta = $this->db->enviarQuery("INSERT INTO alumnos_enfermeria VALUES ('$dni', '$nombre', '$descripcion', $precio)");
 if (!$respuesta){
    echo $this->db->error;
    return false; 

 }else {
     return $respuesta;
 }
    }
public function getAlumno(){
    $respuesta = $this->db->enviarQuery("SELECT * FROM alumnos_enfermeria");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}
public function getAlumno($dni){
    $respuesta = $this->db->enviarQuery("SELECT * FROM alumnos_enfermeria WHERE dni=$dni");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}
public function eliminarAlumno($dni){
    $respuesta = $this->db->enviarQuery("DELETE FROM alumnos_enfermeria WHERE dni=$dni");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}


}


?>