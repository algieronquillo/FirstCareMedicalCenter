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
                    <td>Personnel</td>
                    <td>
                        <select name="personnel">
                            <option value=""> -- SELECT A PERSONNEL --</option>
                            <?php
                            $sql = "SELECT * FROM personnel ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['personnel_id']}'>{$result['lastname']}, {$result['firstname']}, {$result['role']}, {$result['specialty']}</option>";
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
                        <button type="submit" name="assign_personnel" class="button green">Assign</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['assign_personnel'])) {
            // Retrieve selected personnel and medical center
            $personnel_id = mysqli_real_escape_string($conn, $_POST['personnel']);
            $medicalcenter_id = mysqli_real_escape_string($conn, $_POST['medicalcenter']);

            // Use a proper INSERT statement
            $sql = "INSERT INTO assignments (personnel_id, medicalcenter_id) VALUES ('$personnel_id', '$medicalcenter_id')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel has been assigned to a medical center'); window.location='personnel.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
    </center>
</body>

</html>


