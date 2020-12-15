<?php

use DI\Container;
use App\utils\Str;
use Doctrine\Inflector\InflectorFactory;

/**
 * Configuration of the application
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */

return [

    // Configuration of the database
    'db.host' => env('DB_HOST', '127.0.0.1'),
    'db.user' => env('DB_USER', 'root'),
    'db.name' => env('DB_NAME', 'okacode'),
    'db.password' => env('DB_PASSWORD', ''),

    // class to inject
    'inflector' => function () {
        return InflectorFactory::create()->build();
    },
    'str' => function (Container $container) {
        return Str::setService($container->get('inflector'), 'inflector');
    }
];