<?php

/**
 * Configuration of the application
 * 
 * @author mebale noel <noelmeb12@gmail.com>
 */

return [


    // configuration of the database
    'db' => [

        'host' => $_ENV['HOST'],
        'user' => $_ENV['USER'],
        'dbname' => $_ENV['DBNAME'],
        'password' => $_ENV['PASSWORD']
    ]


];