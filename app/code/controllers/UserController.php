<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 18.09.17
 * Time: 14:46
 */

namespace app\code\controllers;

use app\code\models;

/**
 * Class UserController
 * @package app\code\controllers
 */

class UserController extends CoreController
{
    private $template = 'login.phtml';
    private $registr = 'registration.phtml';



    /**
     * main action
     */

    public function indexAction()
    {
        $this->loginAction();
    }

    /**
     * generate Login Page
     */

    public function loginAction()
    {
        $db = new models\Db();
        $db->connectDB();
        $template = $this->getTemplate();
        $template->generatePageHTML(
            $template->renderTemplate($this->template, array(), true),
            array(
                'title' => 'Login',
                'leftbar' => 'leftbar',
                'topmenu' => 'topmenu'
            )
        );

    }

    /**
     * generate Registration Page
     */

    public function registrationAction()
    {
        $registr = $this->getTemplate();
        $registr->generatePageHTML(
            $registr->renderTemplate($this->registr, array(), true),
            array(
                'title' => 'Registration'
            )
        );
    }
}