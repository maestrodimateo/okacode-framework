<?php

/**
 * File for directories configuration
 * 
 * @author mebale noel <noelmeb@gmail.com>
 */

define('BASE', substr($_SERVER['DOCUMENT_ROOT'], 0, -7));
define('ASSETS', BASE . 'public/assets/');
define('VIEWS', BASE . 'src/views/');
define('COMPOSER', BASE . "vendor/autoload.php");
define('ROUTES', BASE . "routes/");
