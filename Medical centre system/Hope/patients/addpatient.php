<?php
include '../dbconnection.php';


if (isset($_POST['submitdetails'])) {
    try {
        $PatientForename = $_POST['PatientForename'];
        $PatientSurname = $_POST['PatientSurname'];
        $Address = $_POST['Address'];
        $Phone = $_POST['Phone'];
        $Email = $_POST['Email'];

        if ($PatientForename == '' || $PatientSurname == '' || $Address == '' || $Phone == '' || $Email == '') {
            echo "<strong>You did not complete the insert form correctly</strong><br>";
        } else {
            $pdo = getDBconnection();
            if ($pdo) {
                $sql = "INSERT INTO patients (PForename, PSurname, Address, Phone, Email) VALUES(:PatientForename, :PatientSurname, :Address, :Phone, :Email)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':PatientForename', $PatientForename);
                $stmt->bindValue(':PatientSurname', $PatientSurname);
                $stmt->bindValue(':Address', $Address);
                $stmt->bindValue(':Phone', $Phone);
                $stmt->bindValue(':Email', $Email);
                $stmt->execute();
                echo "<h2>Patient registered successfully. You can register another one.</h2><br>";
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
include 'addpatient.html';
?>

