<?php
    include("db_connection.php");
?>

<body>
    <?php
        include("style.php");
        include("menu.php");

    
    ?>
    <center>
    <h1> Patients who sign in Medicalcenter</h1>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> fullname </th>
            <th> dateofbirth </th>
            <th> phonenumber </th>
            <th> location </th>
            
        </tr>

            <?php
         $sql = "SELECT * FROM patients 
                 INNER JOIN appointments ON patients.patient_id = appointments.patient_id 
                 INNER JOIN medicalcenter ON medicalcenter.center_id = appointments.center_id"; 
                
                 
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result["lastname"] . ", " . $result['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($result['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($result['phonenumber']) . "</td>";
                echo "<td>" . htmlspecialchars($result['location']) . "</td>";
                echo "</tr>"; // Fixed this line
            }
        }
        ?>
        </table>
    </center>
</body>
</html>