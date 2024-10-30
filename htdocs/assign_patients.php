<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");
    ?>
    <center>
        <h1>Assign Medical Center to Patient</h1>
        <form method="post">
            <table border="1" align="center" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Patients</td>
                    <td>
                        <select name="patient">
                            <option value=""> -- SELECT A PATIENT --</option>
                            <?php
                            $sql = "SELECT * FROM patients ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "<option>Error: " . mysqli_error($conn) . "</option>";
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['patient_id']}'>{$result['firstname']} {$result['lastname']} - {$result['dateofbirth']} - {$result['phonenumber']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Medical Center</td>
                    <td>
                        <select name="medicalcenter">
                            <option value=""> -- SELECT A MEDICAL CENTER --</option>
                            <?php
                            $sql = "SELECT * FROM medicalcenter ORDER BY name";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "<option>Error: " . mysqli_error($conn) . "</option>";
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['center_id']}'>{$result['name']} - {$result['location']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="assign_patient" class="button green">Assign</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['assign_patient'])) {
            // Validate and retrieve selected patient and medical center
            $patient_id = mysqli_real_escape_string($conn, $_POST['patient']);
            $medicalcenter_id = mysqli_real_escape_string($conn, $_POST['medicalcenter']);

            if ($patient_id && $medicalcenter_id) {
                // Insert data into appointments table with the current date
                $sql = "INSERT INTO appointments (patient_id, center_id,) VALUES ('$patient_id', '$medicalcenter_id',())";
                
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Patient has been assigned to a medical center'); window.location='patients.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Please select both a patient and a medical center');</script>";
            }
        }
        ?>
    </center>
</body>
</html>
