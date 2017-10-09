<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 19.09.17
 * Time: 14:43
 */

namespace app\code\models;

use PDO;
use PDOException;

define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', 'root');
define('DBNAME', 'mysite_dev');

class Db
{

    protected $table;
    public $isConn;
    protected $datab;

    //connect to db
    public function __construct(
        $username = "root",
        $password = "root",
        $host = "localhost",
        $dbname = "mysite_dev",
        $options = [])
    {
        $this->isConn = TRUE;
        try {
            $this->datab = new PDO(
                "mysql:host={$host};
                dbname={$dbname};
                charset=utf8",
                $username, $password, $options);

            $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //disconnect db
    public function Disconnect()
    {
        $this->datab = NULL;
        $this->isConn = FALSE;
    }

    //get row

    public function getRow($params = [])
    {
        try {
            $stmt = $this->datab->prepare("SELECT * FROM $this->table WHERE 1 name = ?");
            var_dump($stmt);var_dump($params);
            $stmt->execute($params);
            return $stmt->fetch();
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //get rows

    public function getRows($params = [])
    {
        try {
            $stmt = $this->datab->prepare("SELECT * FROM $this->table");
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //insert row

    public function insertRow($query, $params = [])
    {
        try {
            $stmt = $this->datab->prepare($query);
            $stmt->execute($params);
            return TRUE;
        } catch (PDOException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    //update row

    public function updateRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }

    //delete row
    public function deleteRow($query, $params = [])
    {
        $this->insertRow($query, $params);
    }


}