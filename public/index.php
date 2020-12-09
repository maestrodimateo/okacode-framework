<?php

use App\Http\RequestHandler\Router;
use App\Http\Controllers\HomeController;
use App\ExceptionsHandler\NotFoundException;

require_once  __DIR__ . '/../bootstrap.php';

Router::get('/', [HomeController::class, 'index']);
Router::get('/contact', 'frontend/complete');

Router::get('/accueil/vendredi', 'contact');

Router::post('/inscription', [HomeController::class, 'getData']);

try {
    Router::run($request);
} catch (NotFoundException $th) {
    $th->error404();
}
