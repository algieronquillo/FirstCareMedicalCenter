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
        <table cellpadding="50" align="center" width="100%">
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
            <th>Action</th>
        </tr>
        
        <?php
        // Handle form submission
        if (isset($_POST['add_location'])) {
            $medical_center = mysqli_real_escape_string($conn, trim($_POST['medical_center']));
            $location = mysqli_real_escape_string($conn, trim($_POST['location']));

            // Insert location data into the database
            $sql = "INSERT INTO medicalcenter(`name`, `location`) VALUES ('$medical_center', '$location')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Location has been added'); window.location= 'location.php'; </script>";
            } else {
                echo "<script>alert('Error adding location: " . mysqli_error($conn) . "');</script>";
            }
        }

        // Fetch and display medical centers
        $sql = "SELECT * FROM medicalcenter ORDER BY `name`";
        $query = mysqli_query($conn, $sql);
        while ($result = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($result['name']) . "</td>";
            echo "<td>" . htmlspecialchars($result['location']) . "</td>";
            echo '<td><a href="personnel1.php?name=' . urlencode($result['name']) . '">View Personnel</a></td>';
            echo '<td><a href="view_patients_location.php?center_id=' . urlencode($result['center_id']) . '">View Patients</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
    </center>
</body>
</html>
