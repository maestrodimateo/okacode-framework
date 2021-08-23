<?php

use App\Http\RequestHandler\Router;
use App\Http\Controllers\HomeController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/contact', 'frontend/complete');

Router::get('/accueil/vendredi', 'frontend/complete');

Router::post('/inscription', [HomeController::class, 'getData']);