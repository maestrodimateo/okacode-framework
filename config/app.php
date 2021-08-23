<?php
use App\Http\RequestHandler\Request;

/**
 * container injection
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */


return [
    
    'db.name'     => \DI\env('DB_NAME', 'okacode'),
    'db.username' => \DI\env('DB_USERNAME', 'root'),
    'db.password' => \DI\env('DB_PASSWORD', 'root'),
    'db.host'     => \DI\env('DB_HOST', 'localhost'),
    Request::class => \DI\create()
];