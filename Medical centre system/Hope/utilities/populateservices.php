<?php
include 'dbconnection.php';

try {
    $pdo = getDBconnection();

    if ($pdo) {
        // fetch service names and IDs from the services table
        $sql = "SELECT ServiceID, ServiceName FROM services";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Populate the dropdown menu with service names and IDs
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=\"{$row['ServiceID']}\">{$row['ServiceID']} - {$row['ServiceName']}</option>";
        }
    } else {
        echo "<option>Error: Database connection failed</option>";
    }
} catch (PDOException $e) {
    echo "<option>Error: " . $e->getMessage() . "</option>";
}
?>

