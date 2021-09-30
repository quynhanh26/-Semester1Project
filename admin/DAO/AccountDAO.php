<?php
require_once "Connect.php";

class AccountDAO
{
    public static function CheckAccount($email)
    {
        $sql = "SELECT COUNT(*) AS Total FROM Account WHERE Email = :email";
        $params = array("email" => $email);
        return ExecuteSelectQuery($sql, $params)[0]["Total"] > 0;
    }

    public static function TakePasswd($email)
    {
        $sql = "SELECT Passwd FROM Account WHERE Email = :email";
        $params = array("email" => $email);
        return ExecuteSelectQuery($sql, $params)[0]["Passwd"];
    }

    public static function checkAdmin($email)
    {
        $sql = "SELECT IsAdmin FROM Account WHERE Email = :email";
        $params = array("email" => $email);
        return ExecuteSelectQuery($sql, $params)[0]["IsAdmin"];
    }
}
