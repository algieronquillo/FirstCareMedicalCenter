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
        $allowedFileTypes = ['image/jpg', 'image/jpeg', 'image/png'];

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input[type="file"] {
            padding: 10px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }
        input[type="file"]:hover {
            border-color: #007BFF;
        }
        button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error-msg {
            color: #ff4d4d;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        .success-msg {
            color: #28a745;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #007BFF;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload an Image</h2>
        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
            <label for="upload_file">Choose a file:</label>
            <input type="file" name="file_upload" id="upload_file" required><br><br>
            <button type="submit" name="process-upload">Upload</button>
        </form>

        <a href="gallery.php">View Gallery</a>
    </div>
</body>
</html>
