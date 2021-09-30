<?php

class ErrorPHP
{
    public static function ShowMessage($message)
    {
        echo "<script>alert(\"$message\");</script>";
    }
}
