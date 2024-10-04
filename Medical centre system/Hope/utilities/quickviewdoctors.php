<?php
function getDoctors($pdo) {
    try {
        $sql = 'SELECT DoctorID, DSurname FROM doctors';
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            echo "<h2>A Quick View of Doctors</h2><br>";
            echo "<table border='1'>
                    <tr>
                        <th>Doctor ID</th>
                        <th>Doctor's Surname</th>
                    </tr>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['DoctorID']}</td>
                        <td>{$row['DSurname']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No doctors found in the system.";
        }
    } catch (PDOException $e) {
        echo 'Unable to fetch services: ' . $e->getMessage();
    }
}
?>