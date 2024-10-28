<?php
    include("db_connection.php");
?>

<body>
    <?php
        include("style.php");
        include("menu.php");

        $name = $_GET['name'];

        // Fetch the medical center details
        $course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM medicalcenter WHERE name = '$name'"));
    ?>
    <center>
    <h2> assign patients in the Personnel<?php echo htmlspecialchars($medicalcenter['name']); ?> </h2>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> Full Name </th>
            <th> dateofbirth </th>
            <th> phonenumber </th>
        </tr>
        <?php
         $sql = "SELECT * FROM patients 
                 INNER JOIN appointments ON patients.patient_id = appionments.patient_id 
                 INNER JOIN medicalcenter ON medicalcenter.center_id = appointments.center_id 
                 WHERE medicalcenter.name = '$name'"; // Ensure you filter by center_id
                 
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result["lastname"] . ", " . $result['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($result['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($result['phonenumber']) . "</td>";
                echo "</tr>"; // Fixed this line
            }
        }
        ?>
    </table>
</body>

</html>

