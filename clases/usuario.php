<?php
class usuarios{
public $nombre;
protected $apellido;
private $fecha_nacimiento;


function __construct($nom,$apel){
$this->nombre = $nom;
$this->apellido = $apel;

}

public function setCalcular_edad($fecha_nac){
    $date = date("Y-m-d");
    $dateDifference = abs(strtotime($date) - strtotime($fecha_nac));
    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
    $this->edad= $years;
    
    } 
    
    public function getCalcular_edad(){
    
        return $this->edad;
        
        }

public function imprime_caracteristicas(){
    echo "Nombre: <strong>".$this->nombre."</strong><br>";
    echo "Apellido: ".$this->apellido;
}
}
?>