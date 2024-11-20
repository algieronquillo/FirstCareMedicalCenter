<?php
include("db_connection.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <!-- Inline CSS for styling the image -->
    <style>
        /* Styling for the uploaded image */
        .uploaded-img {
            width: 50px; /* Set the width of the image */
            height: 50px; /* Set the height of the image */
            object-fit: cover; /* Ensures the image fits within the box without distortion */
            border: 2px solid #ddd; /* Optional: Adds a border around the image */
            margin-top: 5px; /* Adds some space above the image */
        }

        /* Additional styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .error-msg {
            color: red;
            font-weight: bold;
        }

        .success-msg {
            color: green;
            font-weight: bold;
        }

        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

<?php
include("menu.php");
?>

<div class="container">
    <br><br>
    <h1>Upload an Image for Medical Centers</h1>
    <br><br>
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
        <label for="upload_file">Choose a file:</label>
        <input type="file" name="file_upload" id="upload_file" required><br><br>
        <button type="submit" name="process-upload">Upload</button>
        <a href="personnel.php">View personnel</a>
    </form> 
</div>

<?php
// Handle file upload in this script
if (isset($_POST['process-upload'])) {
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == UPLOAD_ERR_OK) {
        $filename = $_FILES['file_upload']['name'];
        $filetype = $_FILES['file_upload']['type'];
        $tmpname = $_FILES['file_upload']['tmp_name'];
        $filesize = $_FILES['file_upload']['size'];

        // Maximum file size (2MB)
        $maximumFileSize = 2 * 1024 * 1024; // 2MB

        if ($filesize > $maximumFileSize) {
            echo "<p class='error-msg'>File must be 2MB or smaller.</p>";
            exit();
        }

        // Directory to store uploaded images
        $uploadDir = 'uploads/';

        // Check if the directory exists, if not create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Creates the directory with full permissions
        }

        // Set the full path to store the uploaded file
        $modifiedFilename = uniqid() . "_" . time() . "_" . basename($filename);
        $uploadPath = $uploadDir . $modifiedFilename;

        // Allowed file types
        $allowedFileTypes = ['image/jpg', 'image/jpeg', 'image/png'];

        if (in_array($filetype, $allowedFileTypes)) {
            // Try moving the uploaded file to the specified directory
            if (move_uploaded_file($tmpname, $uploadPath)) {
                // Store the image path in the database
                try {
                    // Check PDO connection
                    if ($pdo) {
                        $stmt = $pdo->prepare("INSERT INTO images (file_path) VALUES (:file_path)");
                        $stmt->bindParam(':file_path', $uploadPath);
                        $stmt->execute();

                        // Display the uploaded image with styling
                        echo "<p class='success-msg'>File uploaded successfully.</p>";
                        echo "<img src='" . $uploadPath . "' alt='Uploaded Image' class='uploaded-img'>";
                    } else {
                        echo "<p class='error-msg'>Database connection failed.</p>";
                    }
                } catch (PDOException $e) {
                    echo "<p class='error-msg'>Error inserting data: " . $e->getMessage() . "</p>";
                }
            } else {
                echo "<p class='error-msg'>Failed to upload file. Please check folder permissions.</p>";
            }
        } else {
            echo "<p class='error-msg'>Invalid file type. Only JPG and PNG files are allowed.</p>";
        }
    } else {
        echo "<p class='error-msg'>No file uploaded or an error occurred.</p>";
    }
}
?>

</body>
</html>
