<?php
include '../dbconnection.php';
include '../header.html';
include '../footer.html';

try {
    $pdo = getDBconnection(); 
    
    if ($pdo) {
        if(isset($_POST['DSurname'])) {
            $dname = $_POST['DSurname'];

            $sql = 'SELECT COUNT(*) FROM doctors WHERE DSurname = :dname';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':dname' => $dname]);
            // Counting rows matching the given surname
            $count = $stmt->fetchColumn();

            if ($count > 0) {
                $sql = 'SELECT DoctorID, DForename, DSurname, DPhone, DEmail FROM doctors WHERE DSurname = :dname';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([':dname' => $dname]);

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<b>Doctor ID: " . $row['DoctorID'] . "<br><br>";
                    echo "Forename: " . $row['DForename'] . "<br><br>";
                    echo "Surname: " . $row['DSurname'] . "<br><br>";
                    echo "Phone: " . $row['DPhone'] . "<br><br>";
                    echo "Email: " . $row['DEmail'] . "<br><br>";
                    echo "<br><br>";
                    echo "<br><br>Click <a href='querywhichdoctor.php'>here</a> to go back.";
                }

            } else {
                echo "No rows matched the query.";
                echo "<br><br><a href='querywhichdoctor.php'>Click here</a> to go back.";
            }
        }
    } else {
        echo "Database connection failed.";
    }
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
    echo $output;
}
?>
