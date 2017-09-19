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
     * @param $file
     * @param array $params
     * @param bool $return
     * @return string
     */

    public function renderTemplate($file, $params = array(), $return = false)
    {
        if ($file != null) {
            extract($params);
            ob_start();
            require_once $_SERVER['DOCUMENT_ROOT'] . 'app/code/views/templates/' . $file;
            if ($return) {
                return ob_get_clean();
            } else {
                echo ob_get_clean();
            }

        }
    }

    /**
     * @param $content
     * @param array $data
     */
    public function generatePageHTML($content, $data = array())
    {
        $data['header'] = $this->renderTemplate('header.phtml', $data, true);
        if (isset($data['leftbar'])){
            $data['leftbar'] = $this->renderTemplate('leftbar.phtml', array(), true);
        } else {
            $data['leftbar'] = '';
        }
        if (isset($data['topmenu'])){
            $data['topmenu'] = $this->renderTemplate('topmenu.phtml', array(), true);
        } else {
            $data['topmenu'] = '';
        }
        $data['footer'] = $this->renderTemplate('footer.phtml', array(), true);
        $data['content'] = $content;

        $this->renderTemplate('index.phtml', $data);

    }
}

