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
    <h1> Personnel who sign in medical center <?php echo htmlspecialchars($course['name']); ?> </h1>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> Name </th>
            <th> Role </th>
            <th> Location </th>
            
        </tr>
        <?php
         $sql = "SELECT * FROM personnel 
                 INNER JOIN medicalpersonnel ON personnel.personnel_id = medicalpersonnel.personnel_id 
                 INNER JOIN medicalcenter ON medicalcenter.center_id = medicalpersonnel.center_id 
                 WHERE medicalcenter.name = '$name'"; // Ensure you filter by center_id
                 
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result["lastname"]) . "</td>";
                echo "<td>" . htmlspecialchars($result['role']) . "</td>";
                echo "<td>" . htmlspecialchars($result['location']) . "</td>";
                
                echo "</tr>"; // Fixed this line
            }
        }
        ?>
    </table>
    
</body>

</html>
