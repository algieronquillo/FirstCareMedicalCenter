
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
    <h1>Location</h1>
    <form method="POST" action="location.php">
        <table cellpadding="10" align="center" width="60%">
            <tr>
                <td><label for="medical_center">Medical Center:</label></td>
                <td><input type="text" name="medical_center" required></td>
            </tr>
            <tr>
                <td><label for="location">Location:</label></td>
                <td><input type="text" name="location" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="add_location" value="Add Location"></td>
            </tr>
        </table>
    </form>
    <table cellpadding="15" align="center" width="70%" border="5">
        <tr>
            <th>Medical Center</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php 
            $sql = "SELECT * FROM medicalcenter ORDER BY `name`";
            $query = mysqli_query($conn, $sql);
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result['name'] . "</td>" ;
                echo "<td>" . $result['location'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    
    <?php
    // Handle form submission
    if (isset($_POST['add_location'])) {
        $medical_center = mysqli_real_escape_string($conn, trim($_POST['medical_center']));
        $location = mysqli_real_escape_string($conn, trim($_POST['location']));

        // Insert location data into the database
        $sql = "INSERT INTO medicalcenter (`name`, `location`) VALUES ('$medical_center', '$location')";

        if (mysqli_query($conn, $sql)) {
            
            echo "<script>alert('Location has been added'); window.location= 'location.php'; </script>";
        } else {
            echo "<script>alert('Error adding location: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    </center>
    
</body>
</html>
