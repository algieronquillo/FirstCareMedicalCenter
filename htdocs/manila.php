<html>
<head>
<?php include("db_connection.php"); ?>
   
</head>
<body>
<?php
   
    include("style.php");
    include("menu.php");
    ?>
    <center>
        <h1>Personnel List</h1>

        <table cellpadding="10" align="center" width="60%" cellspacing="0">
        <tr>
                <th>Fullname</th>
                <th>Role</th>
                <th>Specialty</th>
                <th>Action</th>
            </tr>

            <?php
            // Updated personnel data
            $personnel = [
                ['firstname' => 'Christopher', 'lastname' => 'Jones', 'role' => 'Therapist'],
                ['firstname' => 'David', 'lastname' => 'Lee', 'role' => 'Pharmacist'],
                ['firstname' => 'Elizabeth', 'lastname' => 'Rogers	', 'role' => 'Cardiologist	'],
                ['firstname' => 'Jane', 'lastname' => 'Smith', 'role' => 'Nurse']
            ];

            // Loop through each personnel and display in table
            foreach ($personnel as $person) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($person['firstname'] . " " . $person['lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($person['role']) . "</td>";
                

                echo '<td><a href="view_personnel.php?name=' . urlencode($person['firstname'] . ' ' . $person['lastname']) . '">View Patiens</a></td>';
                echo "</tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>