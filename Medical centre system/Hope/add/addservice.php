<?php
include '../dbconnection.php';
include '../header.html';
include '../footer.html';

if (isset($_POST['submitdetails'])) {
    try {
        $ServiceName = $_POST['ServiceName'];
        $SDescription = $_POST['SDescription'];
        $Rate = $_POST['Rate'];
        $Status = $_POST['Status'];

        if ($ServiceName == '' || $SDescription == '' || $Rate == '' || $Status == '') {
            echo "<strong>You did not complete the Add Service form correctly</strong><br>";
            echo "<b>Click <a href='addservice.html'>here</a> to go back.";
        } else {
            $pdo = getDBconnection();
            if ($pdo) {
                $sql = "INSERT INTO services (ServiceName, SDescription, Rate, Status) VALUES(:ServiceName, :SDescription, :Rate, :Status)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':ServiceName', $ServiceName);
                $stmt->bindValue(':SDescription', $SDescription);
                $stmt->bindValue(':Rate', $Rate);
                $stmt->bindValue(':Status', $Status);
                
                if ($stmt->execute()) {
                    echo "<h2>Service added successfully. Details:</h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>Service Name</th><td>$ServiceName</td></tr>";
                    echo "<tr><th>Description</th><td>$SDescription</td></tr>";
                    echo "<tr><th>Rate</th><td>$Rate</td></tr>";
                    echo "<tr><th>Status</th><td>$Status</td></tr>";
                    echo "</table>";
                    echo "<br><br>";
                    echo "<b>Click <a href='addservice.html'>here</a> to add another service.";
                    
                } else {
                    echo "Error: Service could not be added.";
                }
            } else {
                echo "Database connection failed.";
            }
        }
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        echo $output; 
    }
}

?>
