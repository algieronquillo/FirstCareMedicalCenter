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
    <h1>Personnel</h1>

    <table cellpadding="5" align="center" width="35%" border="">
        <tr>
            <th><h2>Lastname</h2></th>
            <th><h2>Firstname</h2></th>
            <th><h2>Role</h2></th>
            <th><h2>Specialty</h2></th>
            <th><h2>Action</h2></th>
        </tr>

        <?php
        // Fetch personnel data from the database, ordered by last name
        $sql = "SELECT * FROM personnel ORDER BY lastname";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result))
 {

    echo "<tr>"; // Start a new row
                echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                echo "<td>" . htmlspecialchars($row['specialty']) . "</td>";
                echo "<td>
                    <button><a href='?action=delete&personnel_id=" . urlencode($row['personnel_id']) . "' onclick='return confirm(\"Are you sure you want to delete this personnel?\");'>Delete</a></button>
                    
                </td>"; // Delete link 
                echo "</tr>"; // Close the row
            }
        } else {
            echo "<tr><td colspan='5' align='center'>No personnel found</td></tr>"; // Correct colspan
        }
        ?>

    </table>
    </center>
   
<?php
    // Handle delete action
        if (isset($_GET['action']) && isset($_GET['personnel_id'])) {
        $action = trim($_GET['action']);
        $personnel_id = intval(trim($_GET['personnel_id'])); // Use intval to ensure it's an integer
        if ($action == 'delete') {
            $sql = "DELETE FROM personnel WHERE personnel_id = $personnel_id"; // Quote removed since it's an integer
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel has been removed'); window.location= 'personnel.php'; </script>";
            } else {
                echo "<script>alert('Error deleting personnel: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
    ?>
   

</body>
</html>