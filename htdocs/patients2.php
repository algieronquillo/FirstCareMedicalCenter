<!DOCTYPE html>
<head>
<?php include("db_connection.php"); ?>
</head>
<body>
<?php
   
    include("style.php");
    include("menu.php");
    ?>
          
          <tr>
            <th><h2>fullname</h2></th>
            <th><h2>dateofbirth</h2></th>
            <th><h2>phonenumber</h2></th>
           
           
        </tr>

<?php
        // Fetch personnel data from the database, ordered by last name
        $sql = "SELECT * FROM patients ORDER BY firstname";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result))
 {

    echo "<tr>"; // Start a new row
               
                echo "<td>" . htmlspecialchars($row['firstname']) . "," . htmlspecialchars($row['lastname']) .  "</td>";
                echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
                echo "<td>
                echo "<td>"
                echo "<td>";
            }
        } else {
            echo "<tr><td colspan='5' align='center'>No personnel found</td></tr>"; // Correct colspan
        }
        ?>



</body>
</html>