<?php

include_once("./RilevatoreDiUmidita.php");
include_once("./RilevatoreDiPressione.php");
include_once("./DispositivoDiAllarme.php");

class Impianto implements JsonSerializable{
    private $longitudine, $latitudine, $nome;
    private $dispositivi = [];

    public function __construct($nome,$latitudine,$longitudine){
        $this->nome = $nome;
        $this->latitudine = $latitudine;
        $this->longitudine = $longitudine;
    }

    public function addDispositivo($disp){
        $this->dispositivi[count($this->dispositivi)] = $disp;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getLongitudine(){
        return $this->longitudine;
    }

    public function getLatitudine(){
        return $this->latitudine;
    }

    public function getDispositivi(){
        return $this->dispositivi;
    }

    public function getDispositiviByType($tipologia){
        $array = [];
        foreach($this->dispositivi as $disp){
            if(get_class($disp) == $tipologia)
                $array[count($array)] = $disp;
        }
        
        return $array;
    }

    public function jsonSerialize(){
        $array = [
            "nome" => $this->nome,
            "latitudine" => $this->latitudine,
            "longitudine" => $this->longitudine
        ];

        return $array;
    }

    public function createDemo(){
        $rp1 = new RilevatoreDiPressione(1,5,"sss","fluido");
        $rp1->addMisurazione("10/07/2020",7);
        $rp1->addMisurazione("10/08/2020",3);
        $rp2 = new RilevatoreDiPressione(2,2,"ttt","gas");
        $rp2->addMisurazione("2/01/2019",7);
        $rp2->addMisurazione("3/02/2019",3);
        $rp3 = new RilevatoreDiPressione(3,10,"fff","fluido");
        $rp3->addMisurazione("4/07/2005",7);
        $rp3->addMisurazione("5/10/2010",3);
        $ru1 = new RilevatoreDiUmidita(1,3,"lll","terra");
        $ru1->addMisurazione("6/12/2009",7);
        $ru1->addMisurazione("7/02/2016",3);
        $ru2 = new RilevatoreDiUmidita(2,20,"yyy","aria");
        $ru2->addMisurazione("8/05/2015",7);
        $ru2->addMisurazione("9/06/2015",3);
        $ru3 = new RilevatoreDiUmidita(3,7,"ppp","aria");
        $ru3->addMisurazione("20/09/2023",7);
        $ru3->addMisurazione("29/11/2023",3);
        $da1 = new DispositivoDiAllarme(1,"3334445566");
        $da2 = new DispositivoDiAllarme(2,"7778889900");

        $this->dispositivi = [$rp1,$rp2,$rp3,$ru1,$ru2,$ru3,$da1,$da2];
    }

    public function getDispositivo($tipologia,$identificativo){
        foreach ($this->dispositivi as $disp) {
            if(get_class($disp) == $tipologia && $disp->getIdentificativo() == $identificativo)
                return $disp;
        }
        return null;
    }
}