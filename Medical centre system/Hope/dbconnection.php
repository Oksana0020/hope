<?php 
function getDBconnection() {
    $connectionString = "mysql:host=localhost;dbname=diagnosticsystem;charset=utf8";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($connectionString, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        return null;
    }
}
?>