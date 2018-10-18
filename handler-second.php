<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/config/db.php");
class SecAjax extends DB {
    private $pdo;
    public function __construct(){
        $this->pdo = $this->connect();
    }

    public function getData(){
        $query = $this->pdo->prepare("SELECT requests.price,requests.count, offers.name FROM requests LEFT JOIN offers ON requests.offer_id = offers.id
 ORDER BY offers.name");
        $query->execute();
        $queryArr = $query->fetchAll();
        return $queryArr;
    }
}

if(isset($_POST['KEYS']) && $_POST["KEYS"] == 123){
    $ajax = new SecAjax();
    $arr = $ajax->getData();
    echo json_encode($arr);
}