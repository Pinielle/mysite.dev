<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 15.09.17
 * Time: 17:55
 */

namespace app\code\models;

/**
 * Class Template
 * @package app\code\models
 */

class Template
{
    /**
     * @param $file string name for template
     */
    public function renderTemplate($file, $params = array(), $return = false)
    {
        if ($file != null) {
            extract($params);
            ob_start();
            require_once $_SERVER['DOCUMENT_ROOT'] . 'app/code/views/templates/' . $file;
            if ($return) return ob_get_clean();
            else echo ob_get_clean();

        }
    }
}

