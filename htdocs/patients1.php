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

                echo "<td>;
                 echo "</tr>";
            
            }
} else {
    echo "<tr><td colspan='1' align='center'>No patients found</td></tr>"; // Correct colspan to match number of columns
}
?>
        </table>
    </center>
</body>
</html>