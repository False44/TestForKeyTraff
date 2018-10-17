<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/config/db.php");

class Ajax extends DB{
    private $pdo;
    public function __construct(){
        $this->pdo = $this->connect();
    }

    public function getData(){
        $query = $this->pdo->prepare("SELECT requests.*, requests.id as orders_num, offers.name, operators.name as operator_name, 
operators.fio FROM requests LEFT JOIN offers ON requests.offer_id = offers.id LEFT JOIN operators ON requests.operator_id = operators.id
 WHERE requests.count > 2 AND requests.operator_id IN(10,12) GROUP BY offers.name");
        $query->execute();
        $queryArr = $query->fetchAll();
        return $queryArr;
    }
}

if(isset($_POST['KEY']) && $_POST["KEY"] == 123){
    $ajax = new Ajax();
    $arr = $ajax->getData();
    echo json_encode($arr);
}