<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 11:29
 */
namespace app\code\core;

use app\code\controllers\MainController;

class Router
{
    public function start()
    {
        $routePart = explode('/', urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

        $controller = new MainController();
        $routeList = require_once $_SERVER['DOCUMENT_ROOT'] . 'app/config/RouteList.php';

        if(isset($routePart[1]) && trim($routePart[1]) != ''){
            if(isset($routeList[$routePart[1]])){
               $routePart[1] = $routeList[$routePart[1]];
            }
            $controllerName = 'app\\code\\controllers\\' . ucfirst($routePart[1]) . 'Controller';
            $controller = new $controllerName();
        }

        $action = 'index';
        if(isset($routePart[2])  && trim($routePart[2]) != ''){
            $action = $routePart[2] . 'Action';
            var_dump($action);
        }

        $findmethod = method_exists($controller,$action);


        if ($findmethod == true) {
            $controller->$action();
        } else {
            echo 'Rout has not exist!';
        }
    }
}

