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
<h1>Assign Medical Center to Personnel</h1>
<form method="post">
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <td>Personnel</td>
            <td>
                <select name="personnel">
                    <option value=""> -- SELECT A PERSONNEL --</option>
                    <?php
                    $sql = "SELECT personnel.firstname, personnel.lastname 
                            FROM personnel 
                            LEFT JOIN medicalcenter ON personnel.lastname = medicalcenter.personnel_lastname 
                            WHERE medicalcenter.personnel_lastname IS NULL 
                            ORDER BY personnel.lastname";

                    $query = mysqli_query($conn, $sql);
                    if (!$query) {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo "<option value='{$result['lastname']}'>{$result['lastname']}, {$result['firstname']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="assignpersonnel">Assign</button>
            </td>
        </tr>
    </table>
</form>

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
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    } else {
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo "<option value='{$result['name']}'>{$result['name']}, {$result['location']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" name="medicalcenter" class="button green">Assign</button>
            </td>
        </tr>
    </table>
</form>

<?php
if (isset($_POST['assign'])) {
    $personnel = $_POST['personnel'];
    $medicalcenter = $_POST['medicalcenter'];

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
