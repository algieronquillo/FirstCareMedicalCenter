
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
    <table cellpadding="15" align="center" width="70%" border="5">
        <tr>
            <th><h2>Medical Center</h2></th>
        </tr>
    </table>

    <table cellpadding="15" align="center" width="70%" border="5">
        <nav>
            <ul>
                <li><a href="manilacity.php">Manila City, Philippine General Hospital</a></li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li><a href="quezoncity.php">Quezon City, St. Luke's Medical Center</a></li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li><a href="makaticity.php">Makati City, Makati Medical Center</a></li>
            </ul>
        </nav>

        <nav>
            <ul>
                <li><a href="davaocity.php">Davao City, Doctors' University Hospital</a></li>
            </ul>
        </nav>
    </table>

    <form method="POST" action="location.php">
        <table cellpadding="10" align="center" width="60%">
            <tr>
                <td><label for="medical_center">Medical Center:</label></td>
                <td><input type="text" name="medical_center" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="add_location" value="Add Location"></td>
            </tr>
        </table>
    </form>
    <?php
    // Handle form submission
    if (isset($_POST['add_location'])) {
        $medical_center = mysqli_real_escape_string($conn, trim($_POST['medical_center']));

        // Insert location data into the database
        $sql = "INSERT INTO locations (medical_center) VALUES ('$medical_center')";

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
