<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require str_replace("/controllers","",__DIR__)  . '/vendor/autoload.php';

include_once("./Impianto.php");

class ImpiantoController{
    public function index(Request $request, Response $response, $args){
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $response->getBody()->write(json_encode($imp));
        
        return $response->withHeader("Content-Type","application/json");
    }
    public function show(Request $request, Response $response, $args){
        $cf = $args["cf"];
        $classe = new Classe("5dia");
        $response->getBody()->write(json_encode($classe->getAlunno($cf)));
        //$response->withHeader("Content-Type","application/json");
        return $response->withHeader("Content-Type","application/json");
    }
}

?>