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
        <h1>Personnel List</h1>

        <table cellpadding="10" align="center" width="60%" cellspacing="0">
            <tr>
                <th>Fullname</th>
                <th>Role</th>
                <th>Specialty</th>
                <th>Action</th>
            </tr>

            <?php
$sql = "SELECT * FROM patients ORDER BY firstname"; // Fixed SQL syntax
$result = mysqli_query($conn, $sql);

// Loop through each personnel and display in table
foreach ($personnel as $person) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($person['firstname'] . " " . $person['lastname']) . "</td>";
    echo "<td>" . htmlspecialchars($person['role']) . "</td>";
    echo "<td>" . htmlspecialchars($person['Specialty']) . "</td>";
    
    // Correct the href and add missing closing tags
    echo '<td><a href="patients1.php?name=' . urlencode($person['firstname'] . ' ' . $person['lastname']) . '">View Personnel</a></td>';
   
    
    echo "</tr>";
}
?>

        </table>
    </center>
</body>
</html>