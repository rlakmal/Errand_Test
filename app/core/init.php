<?php

spl_autoload_register(function ($classname) {

    require $filename =  "../app/models/" . ucfirst($classname) . ".php";
});
require_once '../app/Providers/Router.php';
require 'route.php';
require 'App.php';
require '.config.php';
require 'functions.php';
require 'Model.php';
require 'Controller.php';

//require "vendor/autoload.php";
require 'PHPMailer/PHPMailer/src/PHPMailer.php'; // Adjust the path accordingly
//        require 'http://localhost/Errand_Test/vendor/PHPMailer/Exception.php';
//        require 'http://localhost/Errand_Test/vendor/PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer/src/Exception.php'; // Adjust the path accordingly
require 'PHPMailer/PHPMailer/src/SMTP.php'; // Adjust the path accordingly
