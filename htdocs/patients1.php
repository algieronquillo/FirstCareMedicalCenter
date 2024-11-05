<?php
include("db_connection.php");

// Function to insert 5 patients if they do not already exist in the `patients` table
function insert_sample_patients($conn) {
    // Check if there are fewer than 5 patients in the database
    $check_query = "SELECT COUNT(*) as count FROM patients";
    $check_result = mysqli_query($conn, $check_query);
    $count = mysqli_fetch_assoc($check_result)['count'];
    
    if ($count < 5) {
        // Insert 5 sample patients
        $patients = [
            ["John", "Doe", "1990-05-12", "1234567890"],
            ["Jane", "Smith", "1985-03-22", "2345678901"],
            ["Alice", "Brown", "1992-07-15", "3456789012"],
            ["Robert", "Wilson", "1988-12-03", "4567890123"],
            ["Mary", "Johnson", "1993-09-25", "5678901234"]
        ];
        
        foreach ($patients as $patient) {
            $sql = "INSERT INTO patients (firstname, lastname, dateofbirth, phonenumber) 
                    VALUES ('{$patient[0]}', '{$patient[1]}', '{$patient[2]}', '{$patient[3]}')";
            mysqli_query($conn, $sql);
        }
    }
}

// Insert sample patients if needed
insert_sample_patients($conn);
?>

<body>
    <?php
    include("style.php");
    include("menu.php");

   

    // Fetch the medical center details
    $center_query = "SELECT * FROM medicalcenter WHERE  'name'";
    $center_result = mysqli_query($conn, $center_query);
    $center = mysqli_fetch_assoc($center_result);
    ?>
    <center>
        <h2>Patients who signed in at Medical Center </h2>

        <br>
        <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>location</th>
              
            </tr>
            <?php
            // SQL query to select up to 5 patients for the specified medical center
            $sql = "SELECT patients.firstname, patients.lastname, patients.dateofbirth, patients.phonenumber, medicalcenter.location
                    FROM patients 
                    INNER JOIN appointments ON patients.patient_id = appointments.patient_id 
                    INNER JOIN medicalcenter ON medicalcenter.center_id = appointments.center_id
                    
                    LIMIT 5"; // Limit to 5 patients per medical center
            $query = mysqli_query($conn, $sql);
            if (!$query) {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            } else {
                // Display each patient's details
                while ($result = mysqli_fetch_assoc($query)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($result["lastname"] . ", " . $result['firstname']) . "</td>";
                    echo "<td>" . htmlspecialchars($result['dateofbirth']) . "</td>";
                    echo "<td>" . htmlspecialchars($result['phonenumber']) . "</td>";
                    
                    echo "</tr>";
                }
                // Handle case where there are no patients for this medical center
                if (mysqli_num_rows($query) == 0) {
                    echo "<tr><td colspan='4' align='center'>No patients found for this medical center</td></tr>";
                }
            }
            ?>

        </table>
    </center>

    <?php
    // Handle delete action
    if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['patient_id'])) {
        $patient_id = intval(trim($_GET['patient_id'])); // Use intval to ensure it's an integer
        $delete_sql = "DELETE FROM patients WHERE patient_id = $patient_id";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<script>alert('Patient has been removed'); window.location= 'patients1.php'; </script>";
        } else {
            echo "<script>alert('Error deleting patient: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>
</body>
</html>

