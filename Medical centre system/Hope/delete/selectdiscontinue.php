<?php
include '../dbconnection.php';
include '../utilities/quickview.php';
include 'whotodiscontinue.html';
include '../footer.html';

try {
    $pdo = getDBconnection();
    
    if ($pdo) {
        getQuickview($pdo);
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) { 
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
?>
