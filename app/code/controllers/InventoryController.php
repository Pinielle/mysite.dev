<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 11:45
 */

namespace app\code\controllers;
use app\code\models;

class InventoryController extends CoreController
{
    /**
     * default action
     */

    public function indexAction()
    {
        $template = new models\Template();
        $template->renderTemplate('inventory');
    }
}