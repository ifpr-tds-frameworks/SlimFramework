<?php

require_once "vendor/autoload.php";

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

$app = new App();

$app->get('/', function(Request $request, Response $response){
    $response->write("Olá Slim (index)");
});

$app->get('/recados[/{id}]', function(Request $request, Response $response, $parametros){

    $pathParameters = $request->getParams();
    $queryParameters = $request->getQueryParams();

    $outrosParametros = $parametros;

    $cabecalhos = $request->getHeaders();

    $dados = [
        "mensagem" => "Olá Slim (recados)",
        "parametros" => $queryParameters,
        "opcoes" => $pathParameters,
        "outros" => $outrosParametros,
        "headers" => $cabecalhos
    ];
    
    $response->write(json_encode($dados));

    return $response;   

});

$app->run();