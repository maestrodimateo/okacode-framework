<?php

use Dotenv\Dotenv;
use App\Http\RequestHandler\Request;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config/directories.php';
require_once COMPOSER;


$config = include_once 'config/app.php';

$request = new Request();
