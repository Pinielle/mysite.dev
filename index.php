<?php
/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.09.17
 * Time: 11:48
 */
use app\code\config\Database as Database;
$conn = new Database();
$conn->dbConnection();
echo $conn;