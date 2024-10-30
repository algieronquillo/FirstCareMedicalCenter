<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");

    // Fetch all patients from the database
    $sql = "SELECT patient_id, firstname, lastname, dateofbirth, phonenumber FROM patients";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit; // Stop execution if there's an error
    }
    ?>

    <center>
    <h2>Patient List</h2>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th>Patient ID</th>
            <th>Full Name</th>
            <th>Date of Birth</th>
            <th>Phone Number</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['patient_id']) . "</td>"; // Display Patient ID
            echo "<td>" . htmlspecialchars($row['lastname'] . ", " . $row['firstname']) . "</td>"; // Full Name
            echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>"; // Date of Birth
            echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>"; // Phone Number
            echo "</tr>";
        }
        ?>
    </table>
    </center>
</body>
</html>
