<?php

class Dispositivo implements JsonSerializable{
    private $identificativo;

    public function __construct($identificativo){
        $this->identificativo = $identificativo;
    }

    public function getIdentificativo(){
        return $this->identificativo;
    }

    public function getAll(){
        return array("identificativo" => $this->identificativo);
    }

    public function jsonSerialize(){
        $array = ["identificativo" => $this->identificativo];
    }
}