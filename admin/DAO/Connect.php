<?php
require_once "Validation/ErrorPHP.php";

$conn;

// Function OpenConnection()
// Purpose: Connect to database.
// Parameters: Not Available.
// Return: Newly created connection.
function OpenConnection()
{
    $dns = "mysql: host=localhost; dbname=SemesterProject; charset=utf8;";
    $username = "doubleat";
    $passwd = "quynhanhprovip123";
    try {
        $conn = new PDO($dns, $username, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        ErrorPHP::ShowMessage($e->getMessage());
    }
}

// Function ExecuteSelectQuery()
// Purpose: Execute the SELECT query.
// Parameters: $sql is prepared statement.
//             $params is an array containing the order's parameters.
// Return: Table of results if the query succeeds. False if the query fails.
function ExecuteSelectQuery($sql, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll();
    } catch (PDOException $e) {
        ErrorPHP::ShowMessage($e->getMessage());
        $result = false;
    }
    $conn = null;
    return $result;
}

// Fuction ExecuteNonQuery()
// Purpose: Execute the INSERT, UPDATE and DELETE query.
// Parameters: $sql is prepared statement.
//             $params is an array containing the order's parameters.
// Return: The number of lines affected if the query succeeded. False if the query fails.
function ExecuteNonQuery($sql, $params = null)
{
    global $conn;
    $conn = OpenConnection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->rowCount();
    } catch (PDOException $e) {
        ErrorPHP::ShowMessage($e->getMessage());
        $result = false;
    }
    $conn = null;
    return $result;
}
