<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");

    // Sanitize the 'name' parameter to prevent SQL injection
    $name = mysqli_real_escape_string($conn, $_GET['name']);

    // Fetch the medical center details
    $center_query = "SELECT * FROM medicalcenter WHERE name = '$name'";
    $center_result = mysqli_query($conn, $center_query);
    $center = mysqli_fetch_assoc($center_result);
    ?>
    <center>
        <h2>Patients who signed in at Medical Center: <?php echo htmlspecialchars($center['name']); ?></h2>

        <br>
        <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
               
            </tr>

            <?php
            // Updated personnel data
            $patients = [
                ['firstname' => 'Charlie', 'lastname' => 'Brown', 'dateofbirth' => '1992-01-10', 'phonenumber' => '0917-345-6789'],
                ['firstname' => 'Diana', 'lastname' => 'Davis', 'dateofbirth' => '1985-09-20', 'phonenumber' => '0917-789-0123'],
                ['firstname' => 'Bob', 'lastname' => 'Johnson', 'dateofbirth' => '1980-07-25', 'phonenumber' => '0917-567-8901'],
                ['firstname' => 'Eric', 'lastname' => 'Miller', 'dateofbirth' => '1998-04-05', 'phonenumber' => '0917-456-7890'],
                ['firstname' => 'Alice', 'lastname' => 'Smith', 'dateofbirth' => '1995-03-12', 'phonenumber' => '0917-123-4567'],
            ];

            // Display each patient's details
            foreach ($patients as $patient) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($patient["lastname"] . ", " . $patient['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($patient['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($patient['phonenumber']) . "</td>";
                
                echo "</tr>";
            }
            
            // Handle case where there are no patients
            if (empty($patients)) {
                echo "<tr><td colspan='4' align='center'>No patients found for this medical center</td></tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
