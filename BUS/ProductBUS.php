<?php
require_once "../DAO/ProductDAO.php";

class ProductBUS
{
    public static function Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $img, $description)
    {
        return ProductDAO::Add($idPro, $namePro, $idCategory, $idBrands, $price, $quantity, $img, $description);
    }

    public static function gettop()
    {
        return ProductDAO::gettop();
    }

    public static function getData()
    {
        return ProductDAO::getData();
    }

    public static function getDataById($idPro)
    {
        return ProductDAO::getDataById($idPro);
    }

    public static function delProduct($idPro)
    {
        return ProductDAO::delProduct($idPro);
    }

    public static function checkPro($idPro)
    {
        return ProductDAO::checkPro($idPro);
    }

    public static function repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton, $Status, $idPro)
    {
        return ProductDAO::repairPro($namePro, $idCategory, $idBrands, $price, $quantity, $img, $descripiton, $Status, $idPro);
    }

    public static function GetPro($idPro)
    {
        return ProductDAO::GetPro($idPro);
    }

    public static function ShowImgesBUS($IdPro)
    {
        return ProductDAO::ShowImgesDAO($IdPro);
    }

    public static function getdtBrands($IdBrands)
    {
        return ProductDAO::getdtBrands($IdBrands);
    }

    public static function SearchGetInfo($namePro)
    {
        return ProductDAO::SearchGetInfo($namePro);
    }

    public static function getProNew()
    {
        return ProductDAO::getProNew();
    }

}
