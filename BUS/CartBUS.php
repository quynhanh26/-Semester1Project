<?php
require_once "../DAO/CartDAO.php";
require_once "../DAO/InvoiceDAO.php";
require_once "../DAO/InvoiceDetailsDAO.php";
require_once "../DAO/ProductDAO.php";

class CartBUS
{
    public static function ShowPro($idAccount)
    {
        return CartDAO::ShowPro($idAccount);
    }

    public static function UpdateQuantity($quantity, $idAccount)
    {
        return CartDAO::UpdateQuantity($quantity, $idAccount);
    }

    public static function addCart($idPro, $idAccount, $quantity)
    {
        if (CartDAO::checkCart($idPro, $idAccount)) {
            return CartDAO::addPro2($idPro, $idAccount);
        }else{
            return CartDAO::addPro($idPro, $idAccount, $quantity);
        }
    }

    public static function updateSL($quantity, $idPro, $idAccount)
    {
        return CartDAO::updateSL($quantity, $idPro, $idAccount);    
    }

        public static function delCart($idPro, $idAccount)
    {
        return CartDAO::delCart($idPro, $idAccount);
    }

    public static function Total($idAccount)
    {
        return CartDAO::total($idAccount);
    }

    public static function Pay($idAccount, $gia)
    {
        if (CartDAO::checkAccount($idAccount)) {
            $cart = CartDAO::getDataById($idAccount);
            $total = CartDAO::total($idAccount);  
            $dateBuy = date("Y-m-d");
            InvoiceDAO::addData($idAccount, $dateBuy, $gia);
            $idInvoice = InvoiceDAO::idMax();
            foreach ($cart as $cart) {
                $sltk = ProductDAO::getDataSL($cart["IdPro"]);
                $quantity = intval($sltk - $cart["Quantity"]);
                if (InvoiceDetailsDAO::addData($idInvoice, $cart["IdPro"], $cart["Quantity"], $total)) {
                    
                    ProductDAO::updateSL($quantity, $cart["IdPro"]);
                }
            }
            CartDAO::delById($idAccount);
            return true;
        
        }
    }

}


