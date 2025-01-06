<?php

# APP TAG
define('APP_TAG', 'Baby_Tracker');

# DATABASE
define('DB_ENGINE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'baby_tracker');
define('DB_CHARSET', 'utf8mb4');
define('DB_USER', 'root');
define('DB_PWD', 'root');

define('DSN', DB_ENGINE .':host='. DB_HOST .';dbname='. DB_NAME .';charset='. DB_CHARSET );

function dump($variable, $name = null) {
    echo "<pre style='background-color: #f9f9f9; border: 1px solid #ccc; padding: 10px;'>";

    if ($name) {
        echo "<strong>Dump of {$name}:</strong>\n";
    } else {
        echo "<strong>Dump of variable:</strong>\n";
    }

    var_dump($variable);

    echo "</pre>";
}