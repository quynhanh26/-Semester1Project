<?php
require_once("Connect.php");
class BrandsDAO
{
    public static function getData()
    {
        $sql = "SELECT * FROM Brands";
        return ExecuteSelectQuery($sql);
    }

    public static function getDataById($idBrands)
    {
        $sql = "SELECT * FROM Brands WHERE IdBrands = :idBrands";
        $params = array("idBrands" => $idBrands);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function checkBrands($idBrands)
    {
        $sql = "SELECT COUNT(*) SL FROM Brands WHERE IdBrands = :idBrands";
        $params = array("idBrands" => $idBrands);
        return ExecuteSelectQuery($sql, $params)[0]["SL"] > 0;
    }

    public static function repairBrands($nameBrands, $origin, $status, $idBrands)
    {
        $sql = "UPDATE Brands SET NameBrands = :nameBrands, Origin = :origin, Status = :status WHERE IdBrands = :idBrands";
        $params = array("nameBrands" => $nameBrands, "origin" => $origin, "status" => $status, "idBrands" => $idBrands);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function delBrands($idBrands)
    {
        $sql = "UPDATE Brands SET Status = 0 WHERE IdBrands = :idBrands";
        $params = array("idBrands" => $idBrands);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function addBrands($nameBrands, $origin)
    {
        $sql = "INSERT INTO Brands (NameBrands, Origin) VALUES (:nameBrands, :origin)";
        $params = array("nameBrands" => $nameBrands, "origin" => $origin);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function GetBrands()
    {
        $sql = "SELECT * FROM brands";
        return ExecuteSelectQuery($sql);
    }  

}
