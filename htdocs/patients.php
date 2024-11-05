<?php
include("db_connection.php");
?>

<body>
    <?php
    include("style.php");
    include("menu.php");
    ?>

    <center>
        <h1>Patient List</h1>
        <br>
        <table class='center-table' border="1" align="center" cellspacing="0" cellpadding="10">
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Location</th>
            </tr>
            <?php
            // Patient data array with assigned locations
            $patients = [
                ['firstname' => 'Alice', 'lastname' => 'Smith', 'dateofbirth' => '1995-03-12', 'phonenumber' => '0917-123-4567', 'location' => 'Cebu City, Cebu, Philippines'],
                ['firstname' => 'Bob', 'lastname' => 'Johnson', 'dateofbirth' => '1980-07-25', 'phonenumber' => '0917-567-8901', 'location' => 'Cebu City, Cebu, Philippines'],
                ['firstname' => 'Charlie', 'lastname' => 'Brown', 'dateofbirth' => '1992-01-10', 'phonenumber' => '0917-345-6789', 'location' => 'Cebu City, Cebu, Philippines'],
                ['firstname' => 'Diana', 'lastname' => 'Davis', 'dateofbirth' => '1985-09-20', 'phonenumber' => '0917-789-0123', 'location' => 'Cebu City, Cebu, Philippines'],
                ['firstname' => 'Eric', 'lastname' => 'Miller', 'dateofbirth' => '1998-04-05', 'phonenumber' => '0917-456-7890', 'location' => 'Cebu City, Cebu, Philippines'],

                ['firstname' => 'Frank', 'lastname' => 'Wilson', 'dateofbirth' => '1975-11-18', 'phonenumber' => '0917-890-1234', 'location' => 'Pagadian City, Zamboanga Peninsula, Philippines'],
                ['firstname' => 'Grace', 'lastname' => 'Taylor', 'dateofbirth' => '1997-02-03', 'phonenumber' => '0917-012-3456', 'location' => 'Pagadian City, Zamboanga Peninsula, Philippines'],
                ['firstname' => 'Henry', 'lastname' => 'Anderson', 'dateofbirth' => '1982-06-15', 'phonenumber' => '0917-234-5678', 'location' => 'Pagadian City, Zamboanga Peninsula, Philippines'],
                ['firstname' => 'Isabella', 'lastname' => 'Harris', 'dateofbirth' => '1999-10-08', 'phonenumber' => '0917-678-9012', 'location' => 'Pagadian City, Zamboanga Peninsula, Philippines'],
                ['firstname' => 'Jack', 'lastname' => 'Martin', 'dateofbirth' => '1987-12-22', 'phonenumber' => '0917-901-2345', 'location' => 'Pagadian City, Zamboanga Peninsula, Philippines'],

                ['firstname' => 'Karen', 'lastname' => 'Thompson', 'dateofbirth' => '1993-03-28', 'phonenumber' => '0917-123-4567', 'location' => 'Makati, Metro Manila, Philippines'],
                ['firstname' => 'Liam', 'lastname' => 'Garcia', 'dateofbirth' => '1989-07-17', 'phonenumber' => '0917-567-8901', 'location' => 'Makati, Metro Manila, Philippines'],
                ['firstname' => 'Maya', 'lastname' => 'Martinez', 'dateofbirth' => '1996-04-02', 'phonenumber' => '0917-345-6789', 'location' => 'Makati, Metro Manila, Philippines'],
                ['firstname' => 'Noah', 'lastname' => 'Lopez', 'dateofbirth' => '1984-09-12', 'phonenumber' => '0917-789-0123', 'location' => 'Makati, Metro Manila, Philippines'],
                ['firstname' => 'Olivia', 'lastname' => 'Gonzalez', 'dateofbirth' => '1991-02-07', 'phonenumber' => '0917-456-7890', 'location' => 'Makati, Metro Manila, Philippines'],

                ['firstname' => 'Sophia', 'lastname' => 'Rodriguez', 'dateofbirth' => '2000-05-18', 'phonenumber' => '0917-890-1234', 'location' => 'Manila, Metro Manila, Philippines'],
                ['firstname' => 'Emma', 'lastname' => 'Hernandez', 'dateofbirth' => '1998-08-25', 'phonenumber' => '0917-012-3456', 'location' => 'Manila, Metro Manila, Philippines'],
                ['firstname' => 'Ava', 'lastname' => 'Lopez', 'dateofbirth' => '2002-01-12', 'phonenumber' => '0917-234-5678', 'location' => 'Manila, Metro Manila, Philippines'],
                ['firstname' => 'Oliver', 'lastname' => 'Martinez', 'dateofbirth' => '1997-09-05', 'phonenumber' => '0917-678-9012', 'location' => 'Manila, Metro Manila, Philippines'],
                ['firstname' => 'Mia', 'lastname' => 'Wilson', 'dateofbirth' => '2001-11-10', 'phonenumber' => '0917-901-2345', 'location' => 'Manila, Metro Manila, Philippines'],
            ];

            // Output patient data
            foreach ($patients as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['lastname'] . ", " . $row['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dateofbirth']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phonenumber']) . "</td>";
                echo "<td>" . htmlspecialchars($row['location']) . "</td>"; // Display location from the array
                echo "</tr>";
            }
            ?>
        </table>
    </center>
</body>
</html>
