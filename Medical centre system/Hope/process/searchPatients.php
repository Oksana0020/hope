<?php
include '../dbconnection.php';
include '../header.html'; 


try {
    $pdo = getDBconnection();
    if ($pdo) {
        if (isset($_POST['psurname'])) {
            $surname = $_POST['psurname'];
            $sql = "SELECT * FROM patients WHERE PSurname LIKE '%$surname%'";
            $stmt = $pdo->query($sql);

            if ($stmt->rowCount() > 0) {
                echo "<h2>Patient Details:</h2>";
                echo "<table border='1'>";
                echo "<tr><th>PatientID</th><th>Forename</th><th>Surname</th><th>Address</th><th>Phone</th><th>Email</th><th>Action</th></tr>";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['PatientID'] . "</td>";
                    echo "<td>" . $row['PForename'] . "</td>";
                    echo "<td>" . $row['PSurname'] . "</td>";
                    echo "<td>" . $row['Address'] . "</td>";
                    echo "<td>" . $row['Phone'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    // "choose" button
                    echo "<td>";
                    echo "<form action='setpatient.php' method='post'>";
                    echo "<input type='hidden' name='PatientID' value='" . $row['PatientID'] . "'>";
                    echo "<input type='hidden' name='Forename' value='" . $row['PForename'] . "'>";
                    echo "<input type='hidden' name='Surname' value='" . $row['PSurname'] . "'>";
                    echo "<button class=\"blue-button\" name='choose' value='Choose'>Choose</button>";

                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No matching patients found.";
                echo "<b>Click <a href='../patients/addpatient.html'>here</a> to register new Patient.";
            }
        } else {
            echo "Please enter a surname.";
        }
    } else {
        echo "Error: Database connection failed.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


//include '../footer.html';
?>
