<?php 
require "../DAO/ProductDAO.php";
$result = ProductDAO::getData();
for($i=0; $i < sizeof($result) ;$i++){
    echo $result[$i]["IdPro"];
    if($i==4){
    break;
    }
}