<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {

    // database configaration 

    // define('DBHOST', 'localhost');

    define('DBHOST', 'localhost:3306');
    define('DBNAME', 'project_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://localhost/Group-project/public');
    define('PUBROOT', dirname(dirname(dirname(__FILE__))) . '/public');
} else {

    // database configaration
    define('DBNAME', '');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'https://www.websitename.com');
}

// https://code.tutsplus.com/pdo-vs-mysqli-which-should-you-use--net-24059t