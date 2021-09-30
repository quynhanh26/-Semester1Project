<?php require_once("Connect.php");

class InvoiceDAO
{
    public static function getData()
    {
        $sql = "SELECT * FROM Invoice";
        return ExecuteSelectQuery($sql);
    }

    public static function addData($idAccount, $dateBuy, $total){
        $sql = "INSERT INTO Invoice(IdAccount, DateBuy, Total) VALUES (:idAccount, :dateBuy, :total)";
        $params = array("idAccount" => $idAccount, "dateBuy" => $dateBuy ,"total" => $total);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function idMax(){
        $sql = "SELECT MAX(IdInvoice) idmax FROM Invoice";
        return ExecuteSelectQuery($sql)[0]['idmax'];
       }
}
