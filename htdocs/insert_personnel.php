<html>
<head>
<?php
include("db_connection.php");
             
?>
</head>
<body>

<?php
 include("style.php");
include("menu.php");
?>
    <center>
        <h1>Insert New Personnel</h1>
        <form method="post" action="insert_personnel.php">
            <table border=5 align="center" cellspacing="0" cellpadding="15">
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td>Role</td>

                    <td><input type="text" name="role" required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="insert_personnel">Insert Personnel</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <?php
    // Handle form submission
    if (isset($_POST['add_personnel'])) {
        $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
        $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
        $role = mysqli_real_escape_string($conn, trim($_POST['role']));
        $specialty = mysqli_real_escape_string($conn, trim($_POST['specialty']));

        // Insert personnel data into the database
        $sql = "INSERT INTO personnel (lastname, firstname, role, specialty) VALUES ('$lastname', '$firstname', '$role', '$specialty')";

            $sql = "SELECT * AND FROM personnel WHERE lastname = '$lastname' name = '$name'";
            $query = mysqli_connect($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('Personnel already exists'); </script>";
            } else {
                $sql = "INSERT INTO personnel ( lastname, name, role,) VALUES ( '$lastname', '$name', '$role')";
                $query = mysqli_connect($conn, $sql);
                if($query) {
                    echo "<script> alert('Personnel inserted successfully'); window.location='personnel.php';</script>";
                } else {
                    echo "<script> alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "'); </script>";
                }

            }
                
        }
    ?>


</body>

</html>
