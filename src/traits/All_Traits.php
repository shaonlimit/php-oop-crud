<?php

namespace App\traits;

use PDO;
use PDOException;


include './vendor/autoload.php';

trait All_Traits
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $pdo;
    public function __construct()
    {

        try {
            $pdo = new PDO("mysql:host=$this->servername;dbname=php-oop-crud", $this->username, $this->password);
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
            // return $pdo;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function get_all_data($table_name)
    {
        $sql = "select * from $table_name";
        $statement = $this->pdo->query($sql);
        $datas = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $datas;
    }
    public function delete_data($id, $table_name)
    {
        $sql = "delete from $table_name where id=$id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
    }
    public function get_single_data($id, $table_name)
    {
        $sql = "select * from $table_name where id = $id";
        $statement = $this->pdo->query($sql);
        $data =  $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}