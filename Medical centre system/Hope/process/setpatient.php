<?php

session_start();

include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try {
    $pdo = getDBconnection();
    
    if ($pdo) {
        // Check if PatientID is set in POST
        if (isset($_POST['PatientID'])) {
            $sql = "SELECT count(*) FROM patients WHERE PatientID=:pid";
            $result = $pdo->prepare($sql);
            $result->bindValue(':pid', $_POST['PatientID']); 
            $result->execute();

            // If a patient with given ID is found
            if ($result->fetchColumn() > 0) {
                $sql = 'SELECT * FROM patients WHERE PatientID = :pid';
                $result = $pdo->prepare($sql);
                $result->bindValue(':pid', $_POST['PatientID']); 
                $result->execute();

                // Fetch patient details
                $row = $result->fetch();
                $id = $row['PatientID'];
                $forename = $row['PForename'];
                $surname = $row['PSurname'];
                $address = $row['Address'];
                $phone = $row['Phone'];
                $email = $row['Email'];

                // Retrieve appointment details from session variables
                $appointmentID = isset($_SESSION['appointmentID']) ? $_SESSION['appointmentID'] : '';
                $serviceID = isset($_SESSION['serviceID']) ? $_SESSION['serviceID'] : '';
                $appointmentDate = isset($_SESSION['appointmentDate']) ? $_SESSION['appointmentDate'] : '';
                $appointmentTime = isset($_SESSION['appointmentTime']) ? $_SESSION['appointmentTime'] : '';

                echo "Service ID: $serviceID";
                include 'displaymoredetails.html';
            } else {
                echo "No patient found. Please try again.";
            }
        } else {
            // PatientID not set in POST
            echo "Patient ID not provided.";
        }
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) { 
    echo 'Error: ' . $e->getMessage();
}
?>
