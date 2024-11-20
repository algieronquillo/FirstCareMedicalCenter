<?php
include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Assign Medical Center to Patient</title>
</head>
<body>
<?php
include("style.php");
include("menu1.php");


?>

<center>
    <h1>Assign Patients to Medical Center </h1>
    <form method="post">
        <table border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td>Patients</td>
                <td>
                    <select name="patient_id" required>
                        <option value="">-- SELECT A PATIENTS --</option>
                        <?php
                        $sql = "SELECT * FROM patients ORDER BY lastname";
                        $query = mysqli_query($conn, $sql);
                        while ($result = mysqli_fetch_assoc($query)) {
                            echo "<option value='{$result['patient_id']}'>{$result['firstname']} {$result['lastname']} - {$result['dateofbirth']} - {$result['phonenumber']}</option>";
                        }
                        ?>
                    </select>
                </td>
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

if (isset($_POST['assign_patient'])) {
    $patient_id = $_POST['patient_id'] ?? '';
    $center_id = $_POST['center_id'] ?? '';
    $appointment_date = date('Y-m-d'); // Current date
    $appointment_time = date('H:i:s'); // Current time

    if (empty($patient_id) || empty($center_id)) {
        echo "<script>alert('Please select both a patient and a medical center.');</script>";
    } else {
        // Check if the patient is already assigned to the selected center
        $stmt = $conn->prepare("SELECT * FROM appointments WHERE patient_id = ? AND center_id = ?");
        $stmt->bind_param("ii", $patient_id, $center_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('This patient is already assigned to the selected medical center.');</script>";
        } else {
            // Insert the new appointment with date and time
            $stmt = $conn->prepare("INSERT INTO appointments (patient_id, center_id, date, time) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiss", $patient_id, $center_id, $appointment_date, $appointment_time);

            if ($stmt->execute()) {
                echo "<script>alert('Patient has been assigned to the medical center successfully'); window.location='patients.php';</script>";
            } else {
                echo "<p>Error: " . $stmt->error . "</p>";
            }
        }

        $stmt->close();
    }
}
?>
</center>


</body>
</html>



