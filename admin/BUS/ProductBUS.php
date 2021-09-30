<?php
require_once "DAO/ProductDAO.php";

class ProductBUS
{
    public static function Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $img, $description,$status)
    {
        return ProductDAO::Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $img, $description, $status);
    }

    public static function getData()
    {
        return ProductDAO::getData();
    }

    public static function delProduct($idPro)
    {
        return ProductDAO::delProduct($idPro);
    }
    
    public static function checkPro($idPro)
    {
        return ProductDAO::checkPro($idPro);
    }
    
    public static function getDataById($idPro)
    {
        return ProductDAO::getDataById($idPro);
    }

    public static function repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton, $Status, $idPro)
    {
        return ProductDAO::repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton, $Status, $idPro);
    }
}
