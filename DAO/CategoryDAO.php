<?php
require_once("Connect.php");
class CategoryDAO
{
    public static function getData()
    {
        $sql = "SELECT * FROM Category";
        return ExecuteSelectQuery($sql);
    }

    public static function addCategory($nameCategory)
    {
        $sql = "INSERT INTO Category (NameCategory) VALUES (:nameCategory)";
        $params = array('nameCategory' => $nameCategory);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function delCategory($idCategory)
    {
        $sql = "UPDATE Category SET Status = 0 WHERE IdCategory = :idCategory";
        $params = array('idCategory' => $idCategory);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function getDataById($idCategory)
    {
        $sql =  "SELECT * FROM Category WHERE IdCategory = :idCategory";
        $params = array('idCategory' => $idCategory);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function repairCategory($nameCategory, $status, $idCategory)
    {
        $sql = "UPDATE Category SET NameCategory = :nameCategory, Status = :status WHERE IdCategory = :idCategory";
        $params = array('nameCategory' => $nameCategory, 'status' => $status, 'idCategory' => $idCategory);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function checkCategory($idCategory)
    {
        $sql = "SELECT COUNT(*) SL FROM Category WHERE IdCategory = :idCategory";
        $params =  array("idCategory" => $idCategory);
        return ExecuteSelectQuery($sql, $params)[0]["SL"] > 0;
    }
}
