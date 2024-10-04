<?php
include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try {
    $pdo = getDBconnection();
    
    if ($pdo) {
        $sql = 'DELETE FROM services WHERE ServiceID = :sid';
        $result = $pdo->prepare($sql);
        $result->bindValue(':sid', $_POST['id']);
        $result->execute();
        echo "<br><b>You just deleted Service number: </b>" . $_POST['id'] . " <br><br> <a href='selectdiscontinue.php'>Click here</a> if you wish to go back and discontinue another service.";
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        echo "Sorry could not delete as that record is linked to other tables in Database click <a href='discontinueservice.html'>here</a> to go back ";
    } else {
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        echo $output;
    }
} 
?>


