<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once("./Impianto.php");

class RilevatoriUmiditaController{
    

    public function index(Request $request, Response $response, $args){
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $rilevatori = $imp->getDispositiviByType("RilevatoreDiUmidita");
        $response->getBody()->write(json_encode($rilevatori));
        
        return $response->withHeader("Content-Type","application/json");
    }


    public function show(Request $request, Response $response, $args){
        $id = $args['id'];
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $rilevatore = $imp->getDispositivo("RilevatoreDiUmidita",$id);
        $response->getBody()->write(json_encode($rilevatore));
        
        return $response->withHeader("Content-Type","application/json");
    }

    public function measures(Request $request, Response $response, $args){
        $id = $args['id'];
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $rilevatore = $imp->getDispositivo("RilevatoreDiUmidita",$id);
        $misure = $rilevatore->getMisurazioni(null);
        $response->getBody()->write(json_encode($misure));
        
        return $response->withHeader("Content-Type","application/json");
    }

    public function measuresAbove(Request $request, Response $response, $args){
        $id = $args['id'];
        $value = $args['value'];
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $rilevatore = $imp->getDispositivo("RilevatoreDiUmidita",$id);
        $misure = $rilevatore->getMisurazioni($value);
        $response->getBody()->write(json_encode($misure));
        
        return $response->withHeader("Content-Type","application/json");
    }
}

?>