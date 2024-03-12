<?php

include_once("./Dispositivo.php");

class DispositivoDiAllarme extends Dispositivo implements JsonSerializable{
    private $numeroDiTelefono;

    public function __construct($identificativo,$numeroDiTelefono){
        parent::__construct($identificativo);
        $this->numeroDiTelefono = $numeroDiTelefono;
    }

    public function getNumeroDiTelefono(){
        return $this->numeroDiTelefono;
    }

    public function jsonSerialize(){

        $array = parent::getAll();
        $array["numeroDiTelefono"] = $this->numeroDiTelefono;

        return $array;
    }
}