<html>
<head>
    <?php include("db_connection.php"); ?>
</head>

<body>
    <?php
    include("style.php");
    include("menu.php");
    ?>
   <center>
    <h1>Personnel</h1>

     
    <table cellpadding="5" align="center" width="80%" border="">
        <tr>
           
            <th><h2>Fullname</h2></th>
            <th><h2>dateofbirth</h2></th>
            <th><h2>phonenumber</h2></th>
            <th><h2>location</h2></th>
            
        </tr>

        <?php
        // Fetch personnel data from the database, ordered by last name
        $sql = "SELECT * FROM patients
        INNER JOIN appointments ON patients.patient_id = appointments.patient_id INNER JOIN medicalcenter ON medicalcenter.center_id = appointments.center_id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
       while ($row = mysqli_fetch_assoc($result))
 {
    echo "<tr>"; // Start a new row
    echo "<td>" . htmlspecialchars($row['lastname']) . " " . htmlspecialchars($row['firstname']) . "</td>";
    echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
    echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td> 
    </td>"; 
    echo "<tr>";
}
} else {
    echo "<tr><td colspan='5' align='center'>No personnel found</td></tr>"; // Correct colspan
}
?>
  </table>

</body>
</html>

