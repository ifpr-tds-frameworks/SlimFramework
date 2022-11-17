<?php

use Slim\App;
use App\Controllers\RecadoController;

$app = new App();

#RECADOS
$app->get   ('/recados', RecadoController::class . ":getAll");
$app->post  ('/recados', RecadoController::class . ":create");
$app->put   ('/recados', RecadoController::class . ":update");
$app->delete('/recados', RecadoController::class . ":delete");

$app->run();