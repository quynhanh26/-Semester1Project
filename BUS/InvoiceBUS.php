<?php
require_once('../DAO/InvoiceDAO.php');
class InvoiceBUS
{
    public static function getData()
    {
        return InvoiceDAO::getData();
    }
}
