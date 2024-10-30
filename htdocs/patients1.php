<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");

    $center_id = $_GET['center_id'];

    // Fetch the medical center details
    $course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM medicalcenter WHERE center_id = '$center_id'"));

   ?>
   <center>

<h2> Patients who sign in medical center <?php echo htmlspecialchars($course['name']); ?> </h2>
    
    <br>
    <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th>FULLNAME</th>
            <th>DATE OF BIRTH</th>
            <th>PHONE NUMBER</th>
            <th>location</th>

            
        </tr>

        <?php
         $sql = "SELECT * FROM appointments
              INNER JOIN patients ON appointments.patient_id = patients.patient_id 
              INNER JOIN medicalcenter ON appointments.center_id = medicalcenter.center_id";
                 
        $query = mysqli_query($conn, $sql);
        if (!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result['lastname'] . ", " . $result['firstname']) . "</td>"; // Full Name
                echo "<td>" . htmlspecialchars($result['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($result['phonenumber']) . "</td>";
                echo"<td>"  . htmlspecialchars($result['location']) . "</td>";  
                echo "</tr>"; // Fixed this line
            }
        }
        ?>
 

    
    </table>
    </center>
</body>

