<?php
require_once "Connect.php";

class CategoryDAO
{
    public static function getData()
    {
        $sql = "SELECT * FROM Category";
        return ExecuteSelectQuery($sql);
    }
    
    public static function delCategory($idCategory)
    {
        $sql = "UPDATE Category SET Status = 0 WHERE IdCategory = :idCategory";
        $params = array('idCategory' => $idCategory);
        return ExecuteNonQuery($sql, $params) > 0;
    }
}
