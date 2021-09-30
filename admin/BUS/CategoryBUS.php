<?php
require_once "DAO/CategoryDAO.php";

class CategoryBUS
{
    public static function getData()
    {
        return CategoryDAO::getData();
    }

    public static function delCategory($idCategory)
    {
        return CategoryDAO::delCategory($idCategory);
    }
}
