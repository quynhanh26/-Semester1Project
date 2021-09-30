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

    public static function Add($fullName, $email, $passwd, $dob, $gender, $isAdmin)
    {
        $sql = "INSERT INTO Account (FullName, Email, Passwd, DoB, Gender, IsAdmin) VALUES (:fullName, :email, :passwd, :dob, :gender, :isAdmin)";
        $params = array('fullName' => $fullName, 'email' => $email, 'passwd' => $passwd, 'dob' => $dob, 'gender' => $gender, 'isAdmin' => $isAdmin);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function TakeInfo($email)
    {
        $sql = "SELECT * FROM Account WHERE Email = :email";
        $params = array("email" => $email);
        return ExecuteSelectQuery($sql, $params)[0];
    }

    public static function ShowProFile($IdAccount){
        $sql = "SELECT * FROM account WHERE IdAccount = :IdAccount";
        $params = array("IdAccount" => $IdAccount);
        return ExecuteSelectQuery($sql, $params)[0];
    }

    public static function EditProFile($FullName, $Email, $Phonenumber, $IdAccount){
        $sql = "UPDATE account SET FullName = :FullName, Email = :Email, Phonenumber = :Phonenumber WHERE IdAccount = :IdAccount";
        $params = array("FullName" => $FullName, "Email" => $Email, "Phonenumber" => $Phonenumber, "IdAccount" => $IdAccount);
        return ExecuteNonQuery($sql, $params) > 0;
    }

    public static function TakePasswdById($IdAccount)
    {
        $sql = "SELECT Passwd FROM Account WHERE IdAccount = :idAccount";
        $params = array("idAccount" => $IdAccount);
        return ExecuteSelectQuery($sql, $params)[0]["Passwd"];
    }

    public static function changePW($passwd, $IdAccount){
        $sql = "UPDATE Account SET Passwd = :passwd WHERE IdAccount = :idAccount";
        $params = array("passwd" => $passwd, "idAccount" => $IdAccount);
        return ExecuteNonQuery($sql, $params);
    }
}
