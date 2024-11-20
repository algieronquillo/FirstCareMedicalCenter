<?php
include("db_connection.php");

// Initialize messages
$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $dateofbirth = $_POST['dateofbirth'];
    $phonenumber = trim($_POST['phonenumber']);

    // Validate input
    if (empty($firstname) || empty($lastname) || empty($dateofbirth) || empty($phonenumber)) {
        $errorMessage = "All fields are required.";
    } else {
        // Insert data into the patients table
        $insertQuery = "INSERT INTO patients (firstname, lastname, dateofbirth, phonenumber) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssss", $firstname, $lastname, $dateofbirth, $phonenumber);

        if ($stmt->execute()) {
            $successMessage = "Patient successfully added!";
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Patient</title>
    <?php include("style.php"); ?>
</head>
<body>
    <?php include("menu1.php"); ?>

    <center>
        <h1>Add New Patient</h1>
        <?php if (!empty($errorMessage)) echo "<p class='error'>$errorMessage</p>"; ?>
        <?php if (!empty($successMessage)) echo "<p class='success'>$successMessage</p>"; ?>

        <form method="POST" action="insert_patients.php">
            <label for="firstname">First Name:</label><br>
            <input type="text" name="firstname" id="firstname" required><br><br>

            <label for="lastname">Last Name:</label><br>
            <input type="text" name="lastname" id="lastname" required><br><br>

            <label for="dateofbirth">Date of Birth:</label><br>
            <input type="date" name="dateofbirth" id="dateofbirth" required><br><br>

            <label for="phonenumber">Phone Number:</label><br>
            <input type="text" name="phonenumber" id="phonenumber" required><br><br>

            <button type="submit" class="btn">Add Patient</button>
        </form>

        <br>
        <a href="patients.php" class="btn">Back to Patients List</a>
    </center>
</body>
</html>
