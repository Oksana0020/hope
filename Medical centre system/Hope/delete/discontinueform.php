<?php
include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try {
    $pdo = getDBconnection();

    if (isset($_POST['submitdetails'])) {
        if ($pdo) {
            $sql = 'SELECT count(*) FROM services where ServiceID = :sid';
            $result = $pdo->prepare($sql);
            $result->bindValue(':sid', $_POST['sid']);
            $result->execute();

            if ($result->fetchColumn() > 0) {
                $sql = 'SELECT * FROM services where ServiceID = :sid';
                $result = $pdo->prepare($sql);
                $result->bindValue(':sid', $_POST['sid']);
                $result->execute();
                
                echo '<b>Here are the details of the service you were looking for deleting:</b>';

                while ($row = $result->fetch()) {
                    include 'discontinuedetails.html'; 
                }
            } else {
                echo "No rows matched the query. <a href='selectdiscontinue.php'>Click here</a> to go back and try another Service ID.";
            }
        } else {
            echo "Database connection failed.";
        }
    }
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}
?>
