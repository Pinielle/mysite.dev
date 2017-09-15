<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 18:22
 */

namespace app\code\controllers;


use app\code\models\Template;

abstract class CoreController
{
    public function indexAction()
    {

    }

    public function __construct()
    {
        $template = new Template();
        return $template;
    }
}