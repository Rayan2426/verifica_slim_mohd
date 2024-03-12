<?php

include_once("./Rilevatore.php");

class RilevatoreDiPressione extends Rilevatore implements JsonSerializable{
    private $tipologia;

    public function __construct($identificativo,$sogliaDiAllarme,$codiceSeriale,$tipologia){
        parent::__construct($identificativo,"bar",$sogliaDiAllarme,$codiceSeriale);
        $this->tipologia = $tipologia;
    }

    public function getTipologia(){
        return $this->tipologia;
    }

    public function jsonSerialize(){

        $array["tipologia"] = $this->tipologia;
        $array = $array + parent::getAll();

        return $array;
    }

    
}