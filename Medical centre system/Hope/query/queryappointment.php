<?php
include '../dbconnection.php';
include '../header.html';
include '../footer.html';

try {
    $pdo = getDBconnection();

    if (isset($_POST['appointment_id'])) {
        $appointment_id = $_POST['appointment_id'];
        $sql = 'SELECT appointments.*, patients.PForename, patients.PSurname, patients.Phone, services.ServiceName
                FROM appointments
                INNER JOIN patients ON appointments.PatientID = patients.PatientID
                INNER JOIN services ON appointments.ServiceID = services.ServiceID
                WHERE AppointmentID = :appointment_id';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':appointment_id' => $appointment_id]);

        $appointment = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($appointment) {
            // display appointment details
            echo "<h2>Appointment Details are the following</h2>";
            echo "<b>Appointment ID: " . $appointment['AppointmentID'] . "<br><br>";
            echo "Date: " . $appointment['AppDate'] . "<br><br>";
            echo "Time: " . $appointment['AppTime'] . "<br><br>";
            echo "Status (S-Scheduled, C-Cancelled, D-Done) is: " . $appointment['AppStatus'] . "<br><br>";
            echo "Patient ID: " . $appointment['PatientID'] . "<br><br>";
            echo "Patient Name: " . $appointment['PForename'] . " " . $appointment['PSurname'] . "<br><br>";
            echo "Patient Phone: " . $appointment['Phone'] . "<br><br>";
            echo "Service ID: " . $appointment['ServiceID'] . "<br><br>";
            echo "Service: " . $appointment['ServiceName'] . "<br><br>";
            echo "<br><br>Click <a href='querywhichappointment.php'>here</a> to go back.";
        } else {
            echo "Appointment was not found.";
            echo "<br><br>If you want to go back click<a href='querywhichappointment.php'>here</a>";
        }
    }
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    echo $output;
}
?>
