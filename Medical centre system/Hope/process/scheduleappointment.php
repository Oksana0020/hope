<?php
include '../dbconnection.php';

try {
    $pdo = getDBconnection();

    // retrieve the maximum AppointmentID
    $sqlAppointmentID = "SELECT MAX(AppointmentID) AS MaxAppointmentID FROM appointments";
    $resultAppointmentID = $pdo->query($sqlAppointmentID);
    $maxAppointmentID = $resultAppointmentID->fetch(PDO::FETCH_ASSOC)['MaxAppointmentID'];
    // retrieve the maximum PatienID
    $sqlPatientID = "SELECT MAX(PatientID) AS MaxPatientID FROM patients";
    $resultPatientID = $pdo->query($sqlPatientID);
    $maxPatientID = $resultPatientID->fetch(PDO::FETCH_ASSOC)['MaxPatientID'];

    // generate next available IDs
    $nextAppointmentID = $maxAppointmentID + 1;
    $nextPatientID = $maxPatientID + 1;

} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
}

include 'scheduleappointment.html';
?>

