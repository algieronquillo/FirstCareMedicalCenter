
<html>
<head>
    <?php include("db_connection.php"); ?>
</head>
<body>
    <?php
    include("style.php");
    include("menu1.php");
    ?>

    <center>
    <h1>Location</h1>
    <!-- Add enctype="multipart/form-data" to allow file uploads -->
    <form method="POST" action="location.php" enctype="multipart/form-data">
        <table cellpadding="50" align="center" width="100%">
            
            <tr>
                <td><label for="location">Medical Center:</label></td>
                <td><input type="text" name="location" required></td>
            </tr>
            <tr>
                <td><label for="profile_image">Profile Image:</label></td>
                <td><input type="file" name="profile_image" accept="image/jpeg, image/png" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="add_location" value="Add Location"></td>
            </tr>
        </table>
    </form>

    <table cellpadding="15" align="center" width="70%" border="5">
        <tr>
            <th>Image</th>
            <th>Location</th>
            <th>Action</th>
            <th>Action</th>
        </tr>

        <?php
        // Handle form submission for adding location
        if (isset($_POST['add_location'])) {
            $medical_center = mysqli_real_escape_string($conn, trim($_POST['medical_center']));
            $location = mysqli_real_escape_string($conn, trim($_POST['location']));

            // Handling the image upload
            if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
                // Define the upload directory
                $upload_dir = 'uploads/';
                // Get the file name and extension
                $file_name = $_FILES['profile_image']['name'];
                $file_tmp = $_FILES['profile_image']['tmp_name'];
                $file_size = $_FILES['profile_image']['size'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                // Generate a unique file name
                $new_file_name = uniqid('img_') . '.' . $file_ext;

                // Allow only certain file types
                $allowed_types = ['jpg', 'jpeg', 'png'];
                if (in_array($file_ext, $allowed_types)) {
                    // Move the uploaded file to the uploads directory
                    if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                        // Insert the location and image path into the database (profile_image is used here)
                        $sql = "INSERT INTO medicalcenter (location, profile_image) VALUES ('$location', '$new_file_name')";
                        if (mysqli_query($conn, $sql)) {
                            echo "<script>alert('Location has been added'); window.location='location.php';</script>";
                        } else {
                            echo "<script>alert('Error adding location: " . mysqli_error($conn) . "');</script>";
                        }
                    } else {
                        echo "<script>alert('Failed to upload image.');</script>";
                    }
                } else {
                    echo "<script>alert('Invalid file type. Only JPG, JPEG, and PNG are allowed.');</script>";
                }
            }
        }
        ?>

        <?php
        // Fetch locations and display them
        $sql = "SELECT * FROM medicalcenter ORDER BY `location`";
        $query = mysqli_query($conn, $sql);
        while ($result = mysqli_fetch_assoc($query)) {
            echo "<tr>";
            // Safely handle possible null values by using ternary operator
            $location_image = isset($result['profile_image']) ? htmlspecialchars($result['profile_image']) : '';
            echo "<td><img src='uploads/" . $location_image . "' width='100' height='100'></td>";

            // Ensure 'location' is not null before using htmlspecialchars
            $location_name = isset($result['location']) ? htmlspecialchars($result['location']) : '';
            echo "<td>" . $location_name . "</td>";

            echo '<td><a href="personnel1.php?location=' . urlencode($result['location']) . '">View Personnel</a></td>';
            echo '<td><a href="patients.php?location=' . urlencode($result['location']) . '">View patients</a></td>';
            echo "</tr>";
        }
        ?>
    </center>
    </table>
</body>
</html>



