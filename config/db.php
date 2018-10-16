<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.10.2018
 * Time: 20:15
 */

class DB {
    protected function connect(){
        $pdo = new PDO("mysql:host=127.0.0.1;dbname=TestEx","root","");
        return $pdo;
    }
}
