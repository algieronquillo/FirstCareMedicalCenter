<?php
include("db_connection.php");
include("menu1.php");
include("style.php");

$uploadDir = "uploads/gallery/";

// Ensure upload directory exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle image upload for gallery
if (isset($_POST['upload_image'])) {
    $image = $_FILES['image'];
    
    $imageOriginalName = basename($image['name']);
    $imageSize = $image['size'];
    $imageTmpName = $image['tmp_name'];
    $imageType = strtolower(pathinfo($imageOriginalName, PATHINFO_EXTENSION));

    // Validate image type and size
    if (!in_array($imageType, ['jpg', 'jpeg', 'png'])) {
        $error = "Only JPG and PNG files are allowed.";
    } elseif ($imageSize > 2 * 1024 * 1024) { // 2MB size limit
        $error = "File size exceeds the 2MB limit.";
    } else {
        $targetFile = $uploadDir . uniqid() . "." . $imageType;

        // Move uploaded image to the target directory
        if (move_uploaded_file($imageTmpName, $targetFile)) {
            // Insert image details into the gallery table
            $query = "INSERT INTO gallery (image_name, image_path, image_type) 
                      VALUES ('$imageOriginalName', '$targetFile', '$imageType')";
            if (mysqli_query($conn, $query)) {
                $success = "Image uploaded successfully!";
            } else {
                $error = "Error saving image details.";
            }
        } else {
            $error = "Error uploading image.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image to Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #444;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border-radius: 5px;
            color: #fff;
        }
        .message.error {
            background-color: #f44336;
        }
        .message.success {
            background-color: #4CAF50;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
        }
        .form-group input[type="file"] {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .gallery img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Upload Image to Gallery</h1>

    <!-- Display success or error messages -->
    <?php if (isset($error)): ?>
        <div class="message error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div class="message success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <!-- Image Upload Form -->
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="image">Upload Image (JPEG/PNG, max 2MB):</label>
            <input type="file" name="image" id="image" required>
        </div>
        <button type="submit" name="upload_image">Upload Image</button>
    </form>

    <!-- Display Uploaded Images -->
    <h2>Uploaded Images</h2>
    <div class="gallery">
        <?php
        // Fetch and display uploaded images from the gallery table
        $query = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="image">
                <img src="<?= htmlspecialchars($row['image_path']) ?>" alt="<?= htmlspecialchars($row['image_name']) ?>">
                <p><?= htmlspecialchars($row['image_name']) ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</div>

</body>
</html>
