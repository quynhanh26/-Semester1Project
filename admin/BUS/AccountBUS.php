<?php
require_once "DAO/AccountDAO.php";

class AccountBUS
{
    public static function Login($email, $passwd)
    {
        if (AccountDAO::CheckAccount($email)) {
            return password_verify($passwd, AccountDAO::TakePasswd($email));
        }
        return false;
    }

    public static function checkAdmin($email)
    {
        return AccountDAO::checkAdmin($email) == 1;
    }
}
