<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 11:45
 */

namespace app\code\controllers;

use app\code\models;

/**
 * Class InventoryController
 * @package app\code\controllers
 */
class InventoryController extends CoreController
{
    public function indexAction()
    {
        $template = $this->getTemplate();
        $template->renderTemplate('header.phtml', array('title' => 'Pages title', 'content' => array('1','2','3')));

        $template->renderTemplate('inventory.phtml');
        $template->renderTemplate('footer.phtml');
    }
}