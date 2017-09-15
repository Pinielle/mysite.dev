<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 17:55
 */

namespace app\code\models;


class Template
{
    /**
     * @param $file string name for template
     */
    public function renderTemplate($file)
    {
        if ($file != null) {
            require_once $_SERVER['DOCUMENT_ROOT']. 'app/code/views/templates/' . $file . '.phtml';
        }
    }
}