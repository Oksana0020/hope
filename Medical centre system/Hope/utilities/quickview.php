<?php
function getQuickview($pdo) {
    try {
        $sql = 'SELECT * FROM services';
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            echo "<h2>A Quick View of Services</h2><br>";
            echo "<table border='1'>
                    <tr>
                        <th>Service ID</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Rate</th>
                        <th>Status</th>
                    </tr>";
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['ServiceID']}</td>
                        <td>{$row['ServiceName']}</td>
                        <td>{$row['SDescription']}</td>
                        <td>{$row['Rate']}</td>
                        <td>{$row['Status']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "No services found.";
        }
    } catch (PDOException $e) {
        echo 'Unable to fetch services: ' . $e->getMessage();
    }
}
?>
