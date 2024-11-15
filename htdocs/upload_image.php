
<?php
include("db_connection.php");
?>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>

   




</head>
<body>


<?php
include("style.php");
include("menu.php");


?>
 
    <centeR>
    <div class="conatainer">
    <br></br>
        <h1>Upload an Image for Medical Centers</h1>

        <br></br>
        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
            <label for="upload_file">Choose a file:</label>
            <input type="file" name="file_upload" id="upload_file" required><br><br>
            <button type="submit" name="process-upload">Upload</button>


            <a href="gallery.php">View Gallery</a>
        </form> 
    </div>


   
<?php


// Include the database connection
include("db_connection.php");

if (isset($_POST['process-upload'])) {
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'] == UPLOAD_ERR_OK) {
        $filename = $_FILES['file_upload']['name'];
        $filetype = $_FILES['file_upload']['type'];
        $tmpname = $_FILES['file_upload']['tmp_name'];

        // Directory to store uploaded images
        $uploadDir = 'uploads/';

        // Check if the directory exists, if not create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Creates the directory with full permissions
        }

        // Set the full path to store the uploaded file
        $uploadPath = $uploadDir . basename($filename);

        // Allowed file types
        $allowedFileTypes = ['image/jpg','image/png'];

        if (in_array($filetype, $allowedFileTypes)) {
            // Try moving the uploaded file to the specified directory
            if (move_uploaded_file($tmpname, $uploadPath)) {
                // Check if the PDO connection was successful
                if ($pdo) {
                    try {
                        // Store the image path in the database
                        $stmt = $pdo->prepare("INSERT INTO images (file_path) VALUES (:file_path)");
                        $stmt->bindParam(':file_path', $uploadPath);
                        $stmt->execute();

                        echo "<p class='success-msg'>File uploaded successfully.</p>";
                    } catch (PDOException $e) {
                        echo "<p class='error-msg'>Error inserting data: " . $e->getMessage() . "</p>";
// Maximum file size (2MB)
$maximumFileSize = 2 * 1024 * 1024;
if ($filesize > $maximumFileSize) {
    echo "<script>alert('File must be 2MB or smaller.'); window.location='gallery.php';</script>";
    exit();
}

// Rename file for uniqueness
$modifiedFilename = uniqid() . "_" . time() . "_" . uniqid() . "_" . $filename;
$uploadDir = 'uploads/';
$uploadPath = $uploadDir . basename($modifiedFilename);




                    }
                } else {
                    echo "<p class='error-msg'>Database connection failed.</p>";
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
