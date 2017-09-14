<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 14.09.17
 * Time: 15:43
 */
namespace app\code\config\Database;
class Database
{
    public function dbConnection()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=mysite_dev', root, root);

    }

}

