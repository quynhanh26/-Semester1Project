<?php
require_once "Connect.php";

class ProductDAO
{
    public static function Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton)
    {
        $sql = "INSERT INTO Product VALUES (:idPro, :namePro, :idCategory, :idBrands, :price, :quantity, :img, :description)";
        $params = array("idPro" => $idPro, "namePro" => $namePro, "idCategory" => $idCategory, "idBrands" => $idBrands, "price" => $price, "quantity" => $quantity, "img" => $img, "description" => $descripiton);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function gettop()
    {
        $sql = "SELECT * FROM Category JOIN Product ON Category.IdCategory = Product.IdCategory JOIN Brands ON Product.IdBrands = Brands.IdBrands LIMIT 5,4";
        return ExecuteSelectQuery($sql);
    }

    public static function getData()
    {
        $sql = "SELECT * FROM Category JOIN Product ON Category.IdCategory = Product.IdCategory JOIN Brands ON Product.IdBrands = Brands.IdBrands";
        return ExecuteSelectQuery($sql);
    }

    public static function getDataById($idPro)
    {
        $sql = "SELECT * FROM Product WHERE IdPro = :idPro";
        $params = array("idPro" => $idPro);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function delProduct($idPro)
    {
        $sql = "UPDATE Product SET Status = 0 WHERE IdPro = :idPro";
        $params = array("idPro" => $idPro);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function checkPro($idPro)
    {
        $sql = "SELECT COUNT(*) SL FROM Product WHERE IdPro = :idPro";
        $params = array("idPro" => $idPro);
        return ExecuteSelectQuery($sql, $params)[0]["SL"] > 0;
    }

    public static function repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton, $Status, $idPro)
    {
        $sql = "UPDATE Product SET NamePro = :namePro, IdCategory = :idCategory, IdBrands = :idBrands, Price = :price, Quantity = :quantity, Img =:img, Description = :description, Status = :status WHERE IdPro = :idPro";
        $params = array("namePro" => $namePro, "idCategory" => $idCategory, "idBrands" => $idBrands, "price" => $price, "quantity" => $quantity, "img" => $img, "description" => $descripiton, "status" => $Status, "idPro" => $idPro);
        return ExecuteNonQuery($sql, $params) > 0;
    }
    public static function GetPro($idPro)
    {
        $sql = "SELECT * FROM Category JOIN Product ON Category.IdCategory = Product.IdCategory JOIN Brands ON Product.IdBrands = Brands.IdBrands WHERE IdPro = :idPro";
        $params = array ("idPro" => $idPro);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function ShowImgesDAO($IdPro)
    {
        $sql = "SELECT * FROM img WHERE IdPro = :IdPro";
        $params = array("IdPro" => $IdPro);
        return ExecuteSelectQuery($sql, $params);
    }

    
    public static function getdtBrands($IdBrands)
    {
        $sql = "SELECT * FROM product WHERE IdBrands = :IdBrands";
        $params = array("IdBrands" => $IdBrands);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function getProNew()
    {
        $sql = "SELECT * FROM Category JOIN Product ON Category.IdCategory = Product.IdCategory JOIN Brands ON Product.IdBrands = Brands.IdBrands LIMIT 10,4";
        return ExecuteSelectQuery($sql);
    }

    public static function updateSL($quantity, $idPro)
    {
        $sql = "UPDATE  Product SET Quantity = :quantity WHERE IdPro = :idPro";
        $params = array("quantity" => $quantity, "idPro" => $idPro);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function SearchGetInfo($namePro)
    {
        $sql = "SELECT * FROM Category JOIN Product ON Category.IdCategory = Product.IdCategory JOIN Brands ON Product.IdBrands = Brands.IdBrands WHERE NamePro LIKE '%$namePro%' LIMIT 0, 10";
        return ExecuteSelectQuery($sql);
    }

    public static function getDataSL($idPro)
    {
        $sql =  "SELECT Quantity From Product WHERE IdPro = :idPro";
        $params = array(":idPro" => $idPro);
        return ExecuteSelectQuery($sql, $params)[0]['Quantity'];
    }
}
