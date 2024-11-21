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
            // Updated query without the images table or its data
            $sql = "SELECT personnel.*, medicalpersonnel.*, medicalcenter.name as center_name 
                    FROM personnel 
                    INNER JOIN medicalpersonnel ON personnel.personnel_id = medicalpersonnel.personnel_id 
                    INNER JOIN medicalcenter ON medicalcenter.center_id = medicalpersonnel.center_id";

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['file_path']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['lastname']) . " " . htmlspecialchars($row['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['specialty']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['center_name']) . "</td>";
                    echo"<td>";
                     echo"<a href='edit_personnel.php?action=edit&personnel_id={$row['personnel_id']}' class='button green'>Edit</a></button> "; 
                     echo "<a href='personnel.php?action=delete&personnel_id={$row['personnel_id']}' class='button red'>Delete</a></button>";
                     echo "</td>";  
                    echo "</tr>";
                }
                }
                else {
                echo "<tr><td colspan='5' align='center'>No personnel found</td></tr>";
            }
            ?>
        </table>

        <?php
        // Delete functionality
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

        
<?php
    if (isset($_POST['process_edit'])) {
        $personnel_id = intval($_POST['personnel_id']); // Ensure personnel_id is an integer
        echo "<script> window.location='edit_personnel.php?action=edit&personnel_id=$personnel_id'; </script>";
    }
?>

    </center>
    
</body>
</html>
