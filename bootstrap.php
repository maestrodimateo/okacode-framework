<?php

require 'config/directories.php'; //Directory constants

require COMPOSER; // Autoloader


$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->addDefinitions(CONFIG . 'app.php');
$container = $containerBuilder->build();