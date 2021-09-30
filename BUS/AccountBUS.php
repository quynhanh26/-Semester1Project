<?php
require_once "../DAO/AccountDAO.php";

class AccountBUS
{
    public static function Login($email, $passwd)
    {
        if (AccountDAO::CheckAccount($email)) {
            return password_verify($passwd, AccountDAO::TakePasswd($email));
        }
        return false;
    }

    public static function Add($fullName, $email, $passwd, $dob, $gender, $isAdmin)
    {
        if (!AccountDAO::CheckAccount($email)) {
            return AccountDAO::Add($fullName, $email, $passwd, $dob, $gender, $isAdmin);
        }
        return false;
    }

    public static function checkAdmin($email)
    {
        return AccountDAO::checkAdmin($email) == 1;
    }

    public static function TakeInfo($email)
    {
        if (AccountDAO::CheckAccount($email)) {
            return AccountDAO::TakeInfo($email);
        }
        return false;
    }
    public static function ShowProFile($IdAccount)
    {
        return AccountDAO::ShowProFile($IdAccount);
    }

    public static function EditProFile($FullName, $Email, $Phonenumber, $IdAccount)
    {
        return AccountDAO::EditProFile($FullName, $Email, $Phonenumber, $IdAccount);
    }

    public static function TakePasswdById($IdAccount)
    {
        return AccountDAO::TakePasswdById($IdAccount);
    }

    public static function changePW($passwd, $IdAccount)
    {
        return AccountDAO::changePW($passwd, $IdAccount);
    }
}
