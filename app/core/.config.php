<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {

    // database configaration 

    // define('DBHOST', 'localhost');

    define('DBHOST', 'localhost:3306');



    define('DBNAME', 'project_db9');



    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'http://localhost/Errand_Test/public');
    define('PUBROOT', dirname(dirname(dirname(__FILE__))) . '/public');
    define('MAIL_PASS', 'qhsz vxxa snes dmzb');
    define('MAIL_USER', 'rruchiralakmal@gmail.com');
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