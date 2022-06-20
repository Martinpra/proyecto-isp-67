<?php
class Inscripcion {
    public $array_prod=[];
    public $materias;
    public function __construct($materias){
        $this->materias=$materias;
        if(!isset($_SESSION["materias_insc"]))$_SESSION["materias_insc"]=[];
        $this->array_prod=$_SESSION["materias_insc"];
    }
    public function introduce_materia($id){
       $materia = $this->materias->getMateria($id);
       array_push($this->array_prod,$materia);
       $_SESSION["materias_insc"] = $this->array_prod;
       
    }
    public function getMateriasInscripcion(){
        return $this->array_prod;
        throw new Exception();
    }
    public function eliminarMateria($indice){
        unset($this->array_prod[$indice]);
        $_SESSION["materias_insc"] = $this->array_prod;
    }
}