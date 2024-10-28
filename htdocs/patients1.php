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
        <h1>Assign Medical Center to Personnel</h1>
        <form method="post">
            <table border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                    <td>patients</td>
                    <td>
                        <select name="patients">
                            <option value=""> -- SELECT A PATIENTS --</option>
                            <?php
                            $sql = "SELECT * FROM patients ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['patient_id']}'>{$result['firstname']}, {$result['lastname']}, {$result['dateofbirth']}, {$result['phonenumber']}</option>";
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
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['center_id']}'>{$result['name']}, {$result['location']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="patients" class="button green">Assign</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['patients'])) {
            // Retrieve selected patients and medical center
            $patient_id = mysqli_real_escape_string($conn, $_POST['patients']);
            $medicalcenter_id = mysqli_real_escape_string($conn, $_POST['medicalcenter']);

            // Use a proper INSERT statement
            $sql = "INSERT INTO appointments (patient_id, center_id) VALUES ('$patient_id', '$medicalcenter_id')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Patients has been assigned to a personnel'); window.location='assign_patients .php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
    </center>
</body>

</html>