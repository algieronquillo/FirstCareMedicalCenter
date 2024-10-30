<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");
    ?>

    <center>
        <h1>Patient List</h1>
        <br>
        <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>location</th>

            </tr>
            <?php
            // Fetch all patients from the database
            $sql = "SELECT * FROM appointments
              INNER JOIN patients ON appointments.patient_id = patients.patient_id 
              INNER JOIN medicalcenter ON appointments.center_id = medicalcenter.center_id";
                     $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "<tr><td colspan='3'>Error: " . mysqli_error($conn) . "</td></tr>";
            } elseif (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['lastname'] . ", " . $row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No patients found</td></tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
