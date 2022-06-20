<?php
class Productos{
private $db;  



public function __construct($base){
$this->db = $base;
}


public function insertarProducto($nombre,$descripcion,$precio){
    $respuesta = $this->db->enviarQuery("INSERT INTO compras VALUES (DEFAULT, '$nombre', '$descripcion', $precio)");
 if (!$respuesta){
    echo $this->db->error;
    return false; 

 }else {
     return $respuesta;
 }
    }
    
public function getProductos(){
    $respuesta = $this->db->enviarQuery("SELECT * FROM enfermeria");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}
public function getProducto($id){
    $respuesta = $this->db->enviarQuery("SELECT * FROM enfermeria");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}
public function eliminarProducto($id){
    $respuesta = $this->db->enviarQuery("DELETE FROM productos WHERE codigo=$id");
    if (!$respuesta){
        echo $this->db->error;
        return false; 
    
     }else {
         return $respuesta;
     }
}


}


?>