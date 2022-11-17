<?php

require_once __DIR__ .  "/vendor/autoload.php";

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Container;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new Container($configuration);
$app = new App($c);

$app->get('/', function(Request $request, Response $response, array $parameters){
    return $response->write("<h1>olá slim</h1>");
});

$app->get('/recados', function(Request $request, $response, $parameters){
    
    $limite = $request->getQueryParam('limite') ?? 10;
    $pagina = $request->getQueryParam('pagina') ?? 1;

    $pagina =  ($pagina - 1) * $limite;

    $host = "localhost";
    $user = "root";
    $password = "password#22"; //bancodedados

    $connection = new PDO("mysql:host=$host;dbname=passarinho_api_v1", $user, $password);

    $query = $connection->query("SELECT * FROM tb_recados LIMIT $limite OFFSET $pagina");

    $lista_recados = $query->fetchAll(PDO::FETCH_ASSOC);




    $recados = [
        "pagina" => $pagina,
        "limite" => $limite,
        "recados " =>  $lista_recados
    ];

    return $response->withJson($recados);
});

$app->get("/recados/{id}", function(Request $request, Response $response, array $parameters){

    $id = $parameters['id'];

    $recados = [
        "id_recado" => $id
    ];

    return $response->withJson($recados);

});

$app->run();