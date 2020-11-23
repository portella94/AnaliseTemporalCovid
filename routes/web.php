<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\LeitoOcupacaoController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return (new LeitoOcupacaoController())->index();
});
$router->get('/populate', function () use ($router) {
    return (new LeitoOcupacaoController())->populate();
});
// $router->get('/', [LeitoOcupacaoController::class, "index"]);
// $router->get('/populate', [LeitoOcupacaoController::class, "populate"]);
// $router->post('/updateGraph', [LeitoOcupacaoController::class, "updateGraph"]);
