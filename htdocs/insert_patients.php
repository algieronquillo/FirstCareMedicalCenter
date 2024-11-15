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
                        <button type="submit" name="assign_patient" class="button green">Assign</button>
                    </td>
                </tr>
                
            </table>
        </form>

        <?php
        // Handle form submission
        if (isset($_POST['assign_patient'])) {
            $lastname = mysqli_real_escape_string($conn, trim($_POST['lastname']));
            $firstname = mysqli_real_escape_string($conn, trim($_POST['firstname']));
            $dateofbirth = mysqli_real_escape_string($conn, trim($_POST['dateofbirth']));
            $phonenumber = mysqli_real_escape_string($conn, trim($_POST['phonenumber']));
            $center_id = mysqli_real_escape_string($conn, trim($_POST['center_id']));

            $sql = "INSERT INTO patients (lastname, firstname, dateofbirth, phonenumber, center_id) 
                    VALUES ('$lastname', '$firstname', '$dateofbirth', '$phonenumber', '$center_id')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Patient has been admitted successfully.'); window.location = 'patients.php';</script>";
            } else {
                echo "<script>alert('Error admitting patient: " . mysqli_error($conn) . "');</script>";
            }
        }
        ?>
    </center>
</body>
</html>
