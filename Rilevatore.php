<?php

include_once("./Dispositivo.php");

class Rilevatore extends Dispositivo implements JsonSerializable{
    private $misurazioni = [];
    private $unitaDiMisura;
    private $sogliaDiAllarme;
    private $codiceSeriale;

    public function __construct($identificativo, $unitaDiMisura,$sogliaDiAllarme,$codiceSeriale){
        parent::__construct($identificativo);
        $this->unitaDiMisura = $unitaDiMisura;
        $this->sogliaDiAllarme = $sogliaDiAllarme;
        $this->codiceSeriale = $codiceSeriale;
    }

    public function addMisurazione($data,$valore){
        $index = count($this->misurazioni);
        $this->misurazioni[$index]["data"] = $data;
        $this->misurazioni[$index]["valore"] = $valore . $this->unitaDiMisura;
    }

    public function getMisurazioni($valore){
        if(!isset($valore))
            return $this->misurazioni;

        $temp = [];
        $valore = intval($valore);
        $index = 0;
        foreach($this->misurazioni as $mis){

            if($mis["valore"] >= $valore){
                $temp[$index]["data"] = $mis["data"];
                $temp[$index]["valore"] = $mis["valore"];
                $index++;
            }
        }

        return $temp;
    }

    public function getUnitaDiMisura(){
        return $this->unitaDiMisura;
    }

    public function getSogliaDiAllarme(){
        return $this->sogliaDiAllarme;
    }

    public function getCodiceSeriale(){
        return $this->codiceSeriale;
    }

    public function jsonSerialize(){

        $array = parent::getAll();
        $array["sogliaDiAllarme"] = $this->sogliaDiAllarme;
        $array["codiceSeriale"] = $this->codiceSeriale;
        $array["unitaDiMisura"] = $this->unitaDiMisura;
        $array["misurazioni"] = $this->misurazioni;

        return $array;
    }

    public function getAll(){

        $array = parent::getAll();
        $array["sogliaDiAllarme"] = $this->sogliaDiAllarme;
        $array["codiceSeriale"] = $this->codiceSeriale;
        $array["unitaDiMisura"] = $this->unitaDiMisura;
        $array["misurazioni"] = $this->misurazioni;

        return $array;
    }
}