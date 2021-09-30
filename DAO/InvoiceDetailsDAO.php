<?php
require_once 'Connect.php';
class InvoiceDetailsDAO
{
    public static function getDataById($idInvoice)
    {
        $sql = "SELECT * FROM InvoiceDetails WHERE IdInvoice = :idInvoice";
        $params = array("idInvoice" => $idInvoice);
        return ExecuteSelectQuery($sql, $params);
    }

    public static function addData($idInvoice, $idPro, $quantity, $price)
    {
        $sql ="INSERT INTO InvoiceDetails VALUES (:idInvoice, :idPro, :quantity, :Price)";
        $params = array("idInvoice" => $idInvoice, "idPro" => $idPro, "quantity" => $quantity, "Price" => $price);
        return ExecuteNonQuery($sql, $params) > 0;
    }
}
