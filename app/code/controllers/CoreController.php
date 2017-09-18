<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 18:22
 */

namespace app\code\controllers;


use app\code\models\Template;

/**
 * Class CoreController
 * @package app\code\controllers
 */
abstract class CoreController
{
    private $template;

    /**
     * CoreController constructor.
     */
    public function __construct()
    {

        $this->template = new Template();
    }

    /**
     * default action
     */

    public function indexAction()
    {

    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        return $this->template;
    }
}