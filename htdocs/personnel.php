<html style="background: url(https://static.vecteezy.com/system/resources/thumbnails/009/213/272/small_2x/healthcare-and-medical-background-with-cardiogram-line-free-vector.jpg); background-size: 200;">
<head>
    <?php
        include("db_connection.php");
    ?>
</head>  

<body>
    <?php
        include("style.php");
        include("menu.php");
    ?>
    <h1>Personnel</h1>

    <table cellpadding="10" align="center" width="70%" border="">
        <tr bgcolor="#a9d3db">
            <th><h2>Lastname</h2></th>
            <th><h2>Name</h2></th>
            <th><h2>Role</h2></th>
        </tr>

        <?php
            // Fetch personnel data from the database
            $sql = "SELECT * FROM personnel";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr bgcolor='#82b9cf'>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>"; // Added missing address
                    echo "</tr>"; // Close the row
                }
            } else {
                echo "<tr><td colspan='3' align='center'>No personnel found</td></tr>";
            }
        ?>

		
    </table>

    
</body>
</html>

