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
        $db = new models\Inventory();
        var_dump($db);
        $getRows = $db->getRows();
        print_r($getRows);
        //$getRow = $db->getRow(["User"]);
        //$getRows = $db->getRows("SELECT * FROM users");
        /*$insertRow = $db->insertRow("INSERT INTO users(name,lastname,email,password,acl) VALUE(?,?,?,?,?)",
            ["qwer","ty","igorpiniella@gmailcom","321","1"]);*/
        /*$updateRow = $db->updateRow("UPDATE users SET  name = ?, lastname = ?, email = ?, password = ?, acl = ? WHERE id = ?",
            ["Vasgen","Abdulabanov","vasgenrullez@tadjik.kz","byashmyash","0","3"]);*/
        //$deleteRow = $db->deleteRow("DELETE FROM users WHERE id = ?",["4"]);

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