<?php

use App\ExceptionsHandler\NotFoundException;

require_once  __DIR__ . '/../bootstrap.php';

require_once ROUTES . "web.php";

try {
    $container->call([App\Http\RequestHandler\Router::class, 'run']);
} catch (NotFoundException $th) {
    $th->error404();
}
