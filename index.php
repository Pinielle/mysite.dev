<?php

require 'app/code/core/Autoload.php';
$autoload = new Autoload();

$router = new \app\code\core\Router();
$router->start();
