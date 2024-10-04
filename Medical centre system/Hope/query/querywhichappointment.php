<?php
include '../dbconnection.php';
include '../utilities/quickviewappointments.php';
include 'queryappointment.html';
include '../footer.html';

try {
    $pdo = getDBconnection();
    
    if ($pdo) {
        getAppointmentsWithPatients($pdo);
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) { 
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine(); 
}
?>