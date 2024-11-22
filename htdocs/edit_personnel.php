<?php
    include("db_connection.php"); // Ensure this file connects to your database
?>
<body>
<?php

include("style.php");
include("menu1.php");
?>
<?php 
    if (isset($_GET['action']) && isset($_GET['personnel_id'])) {
        $action = trim($_GET['action']);
        $personnel_id = intval($_GET['personnel_id']);

        if($action == 'edit') {
            $sql = mysqli_query($conn, "SELECT * FROM personnel WHERE personnel_id = $personnel_id");
            $personnel = mysqli_fetch_assoc($sql);
        }
    }
?>
<center>
    <h1>Edit Personnel</h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td>Personnel ID</td>
                <td><input type="text" name="personnel_id" value="<?php echo $personnel['personnel_id']; ?>" readonly></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lastname" value="<?php echo $personnel['lastname']; ?>" required></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="firstname" value="<?php echo $personnel['firstname']; ?>" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role" value="<?php echo $personnel['role']; ?>" required></td>
            </tr>
            <tr>
                <td>Specialty</td>
                <td><input type="text" name="specialty" value="<?php echo $personnel['specialty']; ?>" required></td>
            </tr>
            <tr>
                <input type="hidden" name="old_personnel_id" value="<?php echo $personnel['personnel_id']; ?>">
                <td colspan="2">
                    <button type="submit" name="edit_personnel">Save Changes</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_POST['edit_personnel'])) {
            $personnel_id = intval($_POST['personnel_id']);
            $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
            $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
            $role = mysqli_real_escape_string($conn, trim($_POST['role']));
            $specialty = mysqli_real_escape_string($conn, trim($_POST['specialty']));
            $old_personnel_id = intval($_POST['old_personnel_id']);

            $sql = "UPDATE personnel 
                    SET lastname = '$lastname', firstname = '$firstname', role = '$role', specialty = '$specialty' 
                    WHERE personnel_id = $old_personnel_id";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel updated successfully'); window.location='personnel.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        }
    ?>
</body>
</html>
