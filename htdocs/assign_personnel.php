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
                    <td>Medical Center</td>
                    <td>
                        <select name="personnel">
                            <option value=""> -- SELECT A Personnel --</option>
                            <?php
                            $sql = "SELECT * FROM personnel ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                        <select name="personnel">
                            <option value=""> -- SELECT A Medical Center --</option>
                            <?php
                            $sql = "SELECT * FROM medicalcenter ORDER BY name";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['center_id']}'>{$result['name']}, {$result['location']}, </option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit" name="assign" class="button green">Assign</button>
                    </td>
                </tr>
                </td>
                </tr>
                <tr>
                </tr>
            </table>
        </form>

        </select>
        </table>
        </form>

        <?php
        if (isset($_POST['assign_personnel'])) {
            $personnel = ($_POST['personnel_lastname']);
            $medical_center = ($_POST['medical_center']);

            if ($personnel && $medicalcenter) {
                $sql = "UPDATE personnel SET medicalcenter = '$medicalcenter' WHERE lastname = '$personnel'";

                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Personnel has been assigned to a medical center'); window.location='personnel.php';</script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "<script>alert('Please select both personnel and medical center.');</script>";
            }
        }
        ?>
</body>

</html>