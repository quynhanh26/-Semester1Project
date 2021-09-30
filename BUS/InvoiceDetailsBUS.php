<?php
require_once '../DAO/InvoiceDetailsDAO.php';
class InvoiceDetailsBUS
{
    public static function getDataById($idInvoice)
    {
        return InvoiceDetailsDAO::getDataById($idInvoice);
    }
}
