<?php

use App\Http\RequestHandler\Router;
use App\Http\Controllers\HomeController;
use App\ExceptionsHandler\NotFoundException;

include_once  __DIR__ . '/../bootstrap.php';


Router::get('accueil/vendre/:id/', [HomeController::class, 'post']);
Router::get('/accueil/vente', [HomeController::class, 'index']);
Router::get('/accueil/vendredi', 'contact');
Router::post('/accueil/vendre/:id/:name', 'view');
Router::post('/post/update/:id', 'view');

try { Router::run($request); } 
catch (NotFoundException $th) { $th->error404(); }

