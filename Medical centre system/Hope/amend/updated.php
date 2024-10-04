<?php
include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try { 
    $pdo = getDBconnection();
    
    if ($pdo) {
        $sql = 'UPDATE services SET ServiceName=:sname, SDescription=:description, Rate=:rate, Status=:status WHERE ServiceID=:sid';
        $result = $pdo->prepare($sql);
        $result->bindValue(':sid', $_POST['ud_id']); 
        $result->bindValue(':sname', $_POST['ud_name']); 
        $result->bindValue(':description', $_POST['ud_description']);
        $result->bindValue(':rate', $_POST['ud_rate']);
        $result->bindValue(':status', $_POST['ud_status']);
        $result->execute();
         
        $count = $result->rowCount();
        if ($count > 0) {
            echo "<b>You have just updated service ID: </b>" . $_POST['ud_id'] . ". <br><br><b>Here are new details:</b><br><br>";
            echo "<table border='1'>";
            echo "<tr><td><b>Name:</b></td><td>" . $_POST['ud_name'] . "</td></tr>";
            echo "<tr><td><b>Description:</b></td><td>" . $_POST['ud_description'] . "</td></tr>";
            echo "<tr><td><b>Rate:</b></td><td>" . $_POST['ud_rate'] . "</td></tr>";
            echo "<tr><td><b>Status:</b></td><td>" . $_POST['ud_status'] . "</td></tr>";
            echo "</table>";
            echo "<br>Click <a href='selectupdate.php'>here</a> to update another service.";
        }
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) { 
    $output = 'Unable to process query: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
    echo $output;
}
?>
