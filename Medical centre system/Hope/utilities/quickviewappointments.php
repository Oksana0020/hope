<?php
function getAppointmentsWithPatients($pdo) {
    try {
        $sql = 'SELECT A.AppointmentID, P.PForename, P.PSurname FROM appointments A INNER JOIN patients P ON A.PatientID = P.PatientID';
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            echo "<h2>Appointments Quick View</h2><br>";
            echo "<table border='1'>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient Forename</th>
                        <th>Patient Surname</th>
                    </tr>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['AppointmentID']}</td>
                        <td>{$row['PForename']}</td>
                        <td>{$row['PSurname']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No appointments found.";
        }
    } catch (PDOException $e) {
        echo 'Unable to fetch appointments with patient details: ' . $e->getMessage();
    }
}
?>