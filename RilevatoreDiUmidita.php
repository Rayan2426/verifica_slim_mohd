<?php

include_once("./Rilevatore.php");

class RilevatoreDiUmidita extends Rilevatore implements JsonSerializable{
    private $posizione;

    public function __construct($identificativo,$sogliaDiAllarme,$codiceSeriale,$posizione){
        parent::__construct($identificativo,"%",$sogliaDiAllarme,$codiceSeriale);
        $this->posizione = $posizione;
    }

    public function getPosizione(){
        return $this->posizione;
    }

    public function jsonSerialize(){

        $array["posizione"] = $this->posizione;
        $array = $array + parent::getAll();

        return $array;
    }
}