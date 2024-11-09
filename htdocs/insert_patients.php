<!DOCTYPE html>
<html>
<head>
    <?php include("db_connection.php"); ?>
    <title>Admit Patients</title>
</head>
<body>
    <?php
    include("style.php");
    include("menu.php");
    ?>

    <center>
        <h1>Admit Patients</h1>

        <form method="POST" action="">
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
                    <td><label for="dateofbirth">Date of Birth:</label></td>
                    <td><input type="date" name="dateofbirth" required></td>
                </tr>
                <tr>
                    <td><label for="phonenumber">Phone Number:</label></td>
                    <td><input type="text" name="phonenumber" required></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="add_patients" value="Add Patient">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        // Handle form submission
        if (isset($_POST['add_patients'])) {
            $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
            $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
            $dateofbirth = mysqli_real_escape_string($conn, trim($_POST['dateofbirth']));
            $phonenumber = mysqli_real_escape_string($conn, trim($_POST['phonenumber']));

            // Update the table name if necessary
            $sql = "INSERT INTO patients (lastname, firstname, dateofbirth, phonenumber) VALUES ('$lastname', '$firstname', '$dateofbirth', '$phonenumber')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Patient has been admitted successfully.'); window.location = 'patients1.php';</script>";
            } else {
                echo "<script>alert('Error admitting patient: " . mysqli_error($conn) . "');</script>";
            }
        }
        ?>
    </center>
</body>
</html>
