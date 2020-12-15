<?php

use App\Http\RequestHandler\Request;
use App\models\Person;

require_once 'config/directories.php';
require_once COMPOSER;

// container dependency injection
$builder = new DI\ContainerBuilder();
$builder->addDefinitions(__DIR__ . '/config/app.php');
$container = $builder->build();

// Loading dotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$container->get('str');
dd((new Person)->find(2));
$request = $container->get(Request::class);