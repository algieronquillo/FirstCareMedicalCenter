<html>
<head>
    <?php include("db_connection.php"); ?>
    <title>Insert Personnel</title>
</head>

<body>
    <?php
    include("style.php");
    include("menu1.php");
    ?>

    <center>
        <h1>Insert Personnel</h1>

        <form method="POST" action="insert_personnel.php" enctype="multipart/form-data">
            <table cellpadding="10" align="center" width="60%">
                <tr>
                    <td><label for="lastname">Lastname:</label></td>
                    <td><input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td><label for="firstname">Firstname:</label></td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td><label for="role">Role:</label></td>
                    <td><input type="text" name="role" required></td>
                </tr>
                <tr>
                    <td><label for="specialty">Specialty:</label></td>
                    <td><input type="text" name="specialty" required></td>
                </tr>
                <tr>
                    <td>Medical Center</td>
                    <td>
                        <select name="center_id" required>
                            <option value="">-- SELECT A MEDICAL CENTER --</option>
                            <?php
                            $sql = "SELECT * FROM medicalcenter ORDER BY location";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$result['center_id']}'>{$result['location']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="profile_image">Profile Image:</label></td>
                    <td><input type="file" name="profile_image" accept="image/jpeg, image/png"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="add_personnel" value="Add Personnel">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['add_personnel'])) {
            // Sanitize input
            $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname'] ?? ''));
            $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname'] ?? ''));
            $role = mysqli_real_escape_string($conn, trim($_POST['role'] ?? ''));
            $specialty = mysqli_real_escape_string($conn, trim($_POST['specialty'] ?? ''));
            $center_id = mysqli_real_escape_string($conn, trim($_POST['center_id'] ?? ''));

            if (empty($center_id)) {
                echo "<script>alert('Please select a valid Medical Center.');</script>";
                exit;
            }

            // Generate full name
            $fullname = $lastname . ', ' . $firstname;

            // Handle image upload
            $profile_image = 'default_image.jpg'; // Default image
            if (!empty($_FILES['profile_image']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowed_types = ['jpg', 'jpeg', 'png'];

                if (in_array($imageFileType, $allowed_types)) {
                    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                        $profile_image = mysqli_real_escape_string($conn, $target_file);
                    } else {
                        echo "<script>alert('Error uploading image. Using default.');</script>";
                    }
                } else {
                    echo "<script>alert('Invalid image format. Only JPG and PNG allowed. Using default.');</script>";
                }
            }

            // Check if the medical center ID exists and fetch its location
            $location_query = "SELECT location FROM medicalcenter WHERE center_id = '$center_id'";
            $location_result = mysqli_query($conn, $location_query);
            $location = ($location_result && mysqli_num_rows($location_result) > 0)
                ? mysqli_fetch_assoc($location_result)['location']
                : 'Unknown Location';

            // Insert data into personnel table
            $sql = "INSERT INTO personnel (fullname, lastname, firstname, role, specialty, medicalcenter_id, location, profile_image) 
                    VALUES ('$fullname', '$lastname', '$firstname', '$role', '$specialty', '$center_id', '$location', '$profile_image')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel has been added successfully'); window.location= 'personnel.php';</script>";
            } else {
                echo "<script>alert('Error adding personnel: " . mysqli_error($conn) . "');</script>";
            }
        }
        ?>
    </center>
</body>
</html>
