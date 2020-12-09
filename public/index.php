<?php

use App\Http\RequestHandler\Router;
use App\ExceptionsHandler\NotFoundException;

require_once  __DIR__ . '/../bootstrap.php';

require_once ROUTES . "web.php";

try {
    Router::run($request);
} catch (NotFoundException $th) {
    $th->error404();
}
