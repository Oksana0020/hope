<?php
include '../dbconnection.php';

// Check if the form is submitted
if (isset($_POST['update'])) { 
    try {
        // Retrieve data from the form
        $appointmentID = $_POST['AppointmentID'];
        $appointmentDate = $_POST['AppointmentDate'];
        $appointmentTime = $_POST['AppointmentTime'];
        $patientID = $_POST['PatientID'];
        $patientForename = $_POST['Forename'];
        $patientSurname = $_POST['Surname'];
        $patientAddress = $_POST['Address'];
        $patientPhone = $_POST['Phone'];
        $patientEmail = $_POST['Email'];
        $serviceID = $_POST['ServiceID'];
        $pdo = getDBconnection(); 

        // Insert data into the database
        $sql = "INSERT INTO appointments (AppointmentID, AppDate, AppTime, PatientID, ServiceID) VALUES (?, ?, ?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$appointmentID, $appointmentDate, $appointmentTime, $patientID, $serviceID]);
        
        // Store appointment details in session variables
        $_SESSION['appointmentID'] = $appointmentID;
        $_SESSION['appointmentDate'] = $appointmentDate;
        $_SESSION['appointmentTime'] = $appointmentTime;
        $_SESSION['patientForename'] = $patientForename;
        $_SESSION['patientSurname'] = $patientSurname;
        $_SESSION['patientAddress'] = $patientAddress;
        $_SESSION['patientPhone'] = $patientPhone;
        $_SESSION['patientEmail'] = $patientEmail;
        $_SESSION['serviceID'] = $serviceID;

        // Redirect to a confirmation page
        header("Location: confirmappointment.html");
        exit();
    } catch (PDOException $e) {
        // Handle db errors
        echo "Error: " . $e->getMessage();
    }
}
?>
