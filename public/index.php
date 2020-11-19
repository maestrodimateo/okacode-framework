<?php

use App\Http\RequestHandler\Router;



include_once '../bootstrap.php';


Router::get('/accueil/vendre/:id/:name', 'view');

phpinfo();
die;