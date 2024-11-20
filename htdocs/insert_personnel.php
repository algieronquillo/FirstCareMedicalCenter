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
    <h1>Insert Personnel</h1>
    <p>inseert the paesonnel and asign to the medicalcenter, upload image</p>

    <form method="POST" action="insert_personnel.php">
        <table cellpadding="30" align="center" width="60%">
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
                            $sql = "SELECT * FROM medicalcenter ORDER BY name";
                            $query = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($query)) {
                                echo "<option value='{$result['center_id']}'>{$result['name']} - {$result['location']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
            
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="add_personnel" value="Add Personnel">
                </td>
            </tr>


        </table>
    </form>

    <?php
    // Handle form submission
    if (isset($_POST['add_personnel'])) {
        $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
        $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
        $role = mysqli_real_escape_string($conn, trim($_POST['role']));
        $specialty = mysqli_real_escape_string($conn, trim($_POST['specialty']));

        // Insert personnel data into the database
        $sql = "INSERT INTO personnel (lastname, firstname, role, specialty,) VALUES ('$lastname', '$firstname', '$role', '$specialty')";

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
