<?php
require_once "Connect.php";


class CartDAO
{
    public static function ShowPro($idAccount)
    {
        $sql = "SELECT * FROM cart JOIN product on cart.IdPro = product.IdPro WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $idAccount);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function UpdateQuantity($quantity, $IdAccount)
    {
        $sql = "UPDATE Cart SET Quantity = :quantity WHERE IdAccount = :IdAccount";
        $params = array('quantity' => $quantity, 'IdAccount' => $IdAccount);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function addPro($idPro, $idAccount, $quantity)
    {
        $sql = "INSERT INTO Cart VALUES (:idPro, :idAccount, :quantity)";
        $params = array("idPro" => $idPro, "idAccount" => $idAccount, "quantity" => $quantity);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function checkCart($idPro, $idAccount)
    {
        $sql = "SELECT COUNT(*) SL FROM Cart WHERE IdPro = :idPro AND IdAccount = :idAccount";
        $params = array("idPro" => $idPro, "idAccount" => $idAccount);
        return ExecuteSelectQuery($sql, $params)[0]["SL"] > 0;
    }

    public static function addPro2($idPro, $idAccount)
    {
        $sql = "UPDATE Cart SET Quantity = Quantity + 1 WHERE IdPro = :idPro AND IdAccount = :idAccount;";
        $params = array("idPro" => $idPro, "idAccount" => $idAccount);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function updateSL($quantity, $idPro, $idAccount)
    {
        $sql = "UPDATE Cart SET Quantity = :quantity WHERE IdPro = :idPro AND IdAccount = :idAccount";
        $params = array("quantity" => $quantity, "idPro" => $idPro, "idAccount" => $idAccount);
        return ExecuteNonQuery($sql, $params);
    }

    public static function delCart($idPro, $idAccount)
    {
        $sql = "DELETE FROM Cart WHERE IdPro = :idPro AND IdAccount = :idAccount";
        $params = array("idPro" => $idPro, "idAccount" => $idAccount);
        return ExecuteNonQuery($sql, $params);
    }

    public static function delById($idAccount)
    {
        $sql = "DELETE FROM Cart WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $idAccount);
        return ExecuteNonQuery($sql, $params);
    }

    public static function checkAccount($idAccount)
    {
        $sql = "SELECT COUNT(*) AS SL FROM Cart WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $idAccount);
        return ExecuteSelectQuery($sql, $params)[0]["SL"] > 0; 
    }

    public static function getDataById($idAccount){
        $sql = "SELECT * FROM Cart WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $idAccount);
        return ExecuteSelectQuery($sql,$params);
    }

    public static function total($idAccount){
        $sql = "SELECT SUM(c.Quantity * p.Price) SL FROM Cart c JOIN Product p ON c.IdPro = p.IdPro WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $idAccount);
        return ExecuteSelectQuery($sql, $params)[0]["SL"];
    }
}