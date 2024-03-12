<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

include_once("./Impianto.php");

class DispositiviAllarmeController{
    

    public function index(Request $request, Response $response, $args){
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $dispositiviallarme = $imp->getDispositiviByType("DispositivoDiAllarme");
        $response->getBody()->write(json_encode($dispositiviallarme));
        
        return $response->withHeader("Content-Type","application/json");
    }


    public function show(Request $request, Response $response, $args){
        $id = $args['id'];
        $imp = new Impianto("Mohd & co.","5'12''9","12'216''123");
        $imp->createDemo();
        $dispositivoallarme = $imp->getDispositivo("DispositivoDiAllarme",$id);
        if(!isset($dispositiviallarme)){
            return $response->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Page not found');
        }
        $response->getBody()->write(json_encode($dispositivoallarme));
        
        return $response->withHeader("Content-Type","application/json");
    }
}

?>