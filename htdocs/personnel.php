<?php
include("db_connection.php");
include("style.php");
include("menu1.php");
?>

<html>
<head>
    <title>Personnel</title>
</head>
<body>
    <center>
        <h1>Personnel</h1>

        <table cellpadding="5" align="center" width="80%" border="1">
            <tr>
                <th>Profile</th>
                <th>Fullname</th>
                <th>Role</th>
                <th>Specialty</th>
                <th>Location</th>
                <th>Action</th>
            </tr>

            <?php
            // Fetch personnel details
            $sql = "SELECT * FROM personnel";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // Check if profile_image is not null, if it is, use a default image
                    $profile_image = !empty($row['profile_image']) ? htmlspecialchars($row['profile_image']) : 'uploads/default_image.jpg';

                    // Combine firstname and lastname to display as Fullname
                    $fullname = htmlspecialchars($row['firstname'] . ' ' . $row['lastname']);

                    echo "<tr>";
                    echo "<td><img src='$profile_image' alt='Profile' width='100'></td>";
                    echo "<td>$fullname</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['specialty']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['location']) . "</td>";
                    echo "<td>";
                    echo "<a href='edit_personnel.php?action=edit&personnel_id={$row['personnel_id']}' class='button green'>Edit</a> ";
                    echo "<a href='personnel.php?action=delete&personnel_id={$row['personnel_id']}' class='button red'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' align='center'>No personnel found</td></tr>";
            }
            ?>
        </table>

        <?php
        // Add Personnel Functionality
        if (isset($_POST['add_personnel'])) {
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $role = mysqli_real_escape_string($conn, $_POST['role']);
            $specialty = mysqli_real_escape_string($conn, $_POST['specialty']);
            $location = mysqli_real_escape_string($conn, $_POST['location']);
            $profile_image = $_FILES['profile_image']['name'];
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($profile_image);

            // Move the uploaded file
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO personnel (profile_image, firstname, lastname, role, specialty, location) 
                        VALUES ('$target_file', '$firstname', '$lastname', '$role', '$specialty', '$location')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Personnel added successfully!'); window.location='personnel.php';</script>";
                } else {
                    echo "<script>alert('Error adding personnel: " . mysqli_error($conn) . "');</script>";
                }
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        }

        // Delete Personnel Functionality
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['personnel_id'])) {
            $personnel_id = intval($_GET['personnel_id']);
            $sql = "SELECT profile_image FROM personnel WHERE personnel_id = $personnel_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if ($row && file_exists($row['profile_image'])) {
                unlink($row['profile_image']); // Delete image file
            }

            $sql = "DELETE FROM personnel WHERE personnel_id = $personnel_id";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel has been removed'); window.location='personnel.php';</script>";
            } else {
                echo "<script>alert('Error deleting personnel: " . mysqli_error($conn) . "');</script>";
            }
        }
        ?>
    </center>
</body>
</html>

