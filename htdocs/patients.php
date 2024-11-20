<?php
include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <?php include("style.php"); ?>
</head>
<body>
    <?php include("menu1.php"); ?>

    <center>
        <h1>Patients</h1>
        <br><br>
        <table class="center-table" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
            </tr>

            <<?php
         $sql = "SELECT * FROM patients 
                 INNER JOIN appointments ON patients.patient_id = appointments.patient_id 
                 INNER JOIN medicalcenter ON medicalcenter.center_id = appointments.center_id"; 

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["lastname"] . ", " . $row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No patients found in the database.</td></tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
