<?php

namespace App\Controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class RecadoController {

    public function getAll(Request $request, Response $response, array $args){
        $response->write("chamou o getAll");
        return $response;
    }

    public function create(Request $request, Response $response, array $args){
        $response->write("chamou o create");
        return $response;
    }

    public function update(Request $request, Response $response, array $args){
        $response->write("chamou o update");
        return $response;
    }

    public function delete(Request $request, Response $response, array $args){
        $response->write("chamou o delete");
        return $response;
    }

}