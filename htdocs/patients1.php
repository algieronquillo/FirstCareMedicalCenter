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
        <h1>Dietician,Nicole Baker</h1>

        <table cellpadding="10" align="center" width="60%" cellspacing="0">
            <tr>
                <th>Fullname</th>
                <th>dateofbirth</th>
                <th>phonenumber</th>
            </tr>

            <?php
// Fetch specific patients data from the database, ordered by first name
$sql = "SELECT * FROM patients WHERE firstname IN ('Alice', 'Bob', 'Charlie','Diana','Eric') ORDER BY firstname"; // Fixed SQL syntax
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>"; // Start a new row
        echo "<td>" . htmlspecialchars($row['firstname']) . ", " . htmlspecialchars($row['lastname']) . "</td>"; // Display full name
        echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
        echo "</tr>"; // Close the row

    }
} else {
    echo "<tr><td colspan='1' align='center'>No patients found</td></tr>"; // Correct colspan to match number of columns
}
?>
        </table>
    </center>
</body>
</html>