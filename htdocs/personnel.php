<?php
include("db_connection.php");
include("style.php");
include("menu.php");
?>

<html>
<head><title>Personnel</title></head>
<body>
    <center>
        <h1>Personnel</h1>
        <table cellpadding="5" align="center" width="80%" border="1">
            <tr>
                <th>Image</th>
                <th>Fullname</th>
                <th>Role</th>
                <th>Specialty</th>
                <th>Location</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT personnel.*, medicalpersonnel.*, medicalcenter.name as center_name, images.file_path 
                    FROM personnel 
                    INNER JOIN medicalpersonnel ON personnel.personnel_id = medicalpersonnel.personnel_id 
                    INNER JOIN medicalcenter ON medicalcenter.center_id = medicalpersonnel.center_id
                    LEFT JOIN images ON personnel.image_id = images.id"; // Adjust column if needed

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . htmlspecialchars($row['file_path']) . "' alt='Personnel Image' width='50' height='50'></td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . " " . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['specialty']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['center_name']) . "</td>";
                    echo "<td>
                            <button><a href='?action=delete&personnel_id=" . urlencode($row['personnel_id']) . "' onclick='return confirm(\"Are you sure you want to delete this personnel?\");'>Delete</a></button>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' align='center'>No personnel found</td></tr>";
            }
            ?>
        </table>

        <?php
        if (isset($_GET['action']) && isset($_GET['personnel_id'])) {
            $action = $_GET['action'];
            $personnel_id = intval($_GET['personnel_id']);
            if ($action == 'delete') {
                $sql = "DELETE FROM personnel WHERE personnel_id = $personnel_id";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Personnel has been removed'); window.location= 'personnel.php'; </script>";
                } else {
                    echo "<script>alert('Error deleting personnel: " . mysqli_error($conn) . "');</script>";
                }
            }
        }
        ?>
    </center>
</body>
</html>

