<?php
session_start();

include '../header.html';
include '../dbconnection.php';
include '../footer.html';

try {
    $pdo = getDBconnection();

    if ($pdo) {
        if (isset($_POST['AppointmentID']) && isset($_POST['ServiceID']) && isset($_POST['AppointmentDate']) && isset($_POST['AppointmentTime'])) {
            // Retrieve appointment details
            $appointmentID = $_POST['AppointmentID'];
            $serviceID = $_POST['ServiceID'];
            $appointmentDate = $_POST['AppointmentDate'];
            $appointmentTime = $_POST['AppointmentTime'];

            // checking if the selected service ID is found in appointments for the selected date and time
            $stmt = $pdo->prepare("SELECT * FROM appointments WHERE ServiceID = ? AND AppDate = ? AND AppTime = ?");
            $stmt->execute([$serviceID, $appointmentDate, $appointmentTime]);
            $existingAppointment = $stmt->fetch();

            if (!$existingAppointment) {
                // Save appointment details in session
                $_SESSION['appointmentID'] = $appointmentID;
                $_SESSION['serviceID'] = $serviceID;
                $_SESSION['appointmentDate'] = $appointmentDate;
                $_SESSION['appointmentTime'] = $appointmentTime;

                include 'displayappointmentdetails.html';
            } else {
                echo "<b>No available time slots found for this service at the requested date and time. <b><br><br>";
                echo "<b>Click <a href='scheduleappointment.php'>here</a> to choose another time slot.";
            }
        } else {
            echo "Error: Appointment details not provided.";
        }
    } else {
        echo "Error: Database connection failed.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
