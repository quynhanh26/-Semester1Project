<?php
require_once("../DAO/BrandsDAO.php");
class BrandsBUS
{
    public static function getData()
    {
        return BrandsDAO::getData();
    }

    public static function getDataById($idBrands)
    {
        return BrandsDAO::getDataById($idBrands);
    }

    public static function checkBrands($idBrands)
    {
        return BrandsDAO::checkBrands($idBrands);
    }

    public static function repairBrands($nameBrands, $origin, $status, $idBrands)
    {
        return BrandsDAO::repairBrands($nameBrands, $origin, $status, $idBrands);
    }

    public static function delBrands($idBrands)
    {
        return BrandsDAO::delBrands($idBrands);
    }

    public static function addBrands($nameBrands, $origin)
    {
        return BrandsDAO::addBrands($nameBrands, $origin);
    }

    public static function GetBrands()
    {
        return BrandsDAO::GetBrands();
    }


}
