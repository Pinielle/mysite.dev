<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 11:29
 */

namespace app\code\core;


class Router
{
    public function start()
    {
        $routePart = explode('/', urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        $controller = new MainController();
        if(isset($routePart[1]) && trim($routePart[1]) != ''){
            $controllerName = ucfirst($routePart[1]) . 'Controller';
            $controller = new $controllerName();
        }

        $action = 'index';
        if(isset($routePart[2])  && trim($routePart[2]) != ''){
            $action = $routePart[2];
        }

        $findmethod = method_exists($controller,$action);


        if ($findmethod == true) {
            $controller->$action();
        } else {
            echo 'Rout has no exist!';
        }
    }
}