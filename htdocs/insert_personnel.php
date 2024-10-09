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
    <h1>Insert Personnel</h1>

    <form method="POST" action="insert_personnel.php">
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
                <td colspan="2" align="center">
                    <input type="submit" name="add_personnel" value="Add Personnel">
                </td>
            </tr>
        </table>
    </form>

    <?php
        if(isset($_POST['personnel.php'])) {
            $lastname = $_POST['lastname'];
            $name = $_POST['name'];
            $role = $_POST['role'];
            $address = $_POST['address'];

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Personnel has been added'); window.location= 'personnel.php'; </script>";
        } else {
            echo "<script>alert('Error adding personnel: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    </center>
</body>
</html>
