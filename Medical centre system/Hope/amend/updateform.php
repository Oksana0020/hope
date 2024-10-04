<?php
include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try { 
    $pdo = getDBconnection();
    
    if ($pdo) {
        $sql = "SELECT count(*) FROM services WHERE ServiceID=:sid";
        $result = $pdo->prepare($sql);
        $result->bindValue(':sid', $_POST['id']); 
        $result->execute();

        if ($result->fetchColumn() > 0) {
            $sql = 'SELECT * FROM services WHERE ServiceID = :sid';
            $result = $pdo->prepare($sql);
            $result->bindValue(':sid', $_POST['id']); 
            $result->execute();

            $row = $result->fetch();
            $id = $row['ServiceID'];
            $name = $row['ServiceName'];
            $description = $row['SDescription'];
            $rate = $row['Rate'];
            $status = $row['Status'];
            
            include 'displaydetails.html';

        } else {
            echo "No rows matched the query. Please try again. ";
            echo "Click <a href='selectupdate.php'>here</a> to go back.";
        }
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) { 
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}

?>


