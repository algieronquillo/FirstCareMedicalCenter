<?php
include("db_connection.php");
include("style.php");
 // Ensure this contains the full menu HTML structure
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #444;
        }

        /* Styling the container and the gallery */
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Gallery grid styling */
        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .gallery img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .gallery .image {
            flex: 1;
            min-width: 150px;
            max-width: 150px;
            display: inline-block;
        }

        /* Success and error message styles */
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

        /* Link styles */
        a {
            text-decoration: none;
            color: #007BFF;
            font-size: 16px;
        }

        a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>

    <!-- Include Menu -->
    <?php include("menu1.php"); ?>

    <div class="container">
        <h2>Image Gallery</h2>

        <!-- Success or error message -->
        <?php if (isset($error)): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <div class="message success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <!-- Gallery Display -->
        <div class="gallery">
            <?php
            // Fetch images from gallery table
            $query = "SELECT image_name, image_path FROM gallery ORDER BY uploaded_at DESC";
            $result = mysqli_query($conn, $query);

            // Display images
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = htmlspecialchars($row['image_path']);
                    $imageName = htmlspecialchars($row['image_name']);
                    echo "<div class='image'>
                            <img src='$imagePath' alt='$imageName'>
                            <p>$imageName</p>
                          </div>";
                }
            } else {
                echo "<p>No images found in the gallery.</p>";
            }
            ?>
        </div>

        <!-- Link to upload more images -->
        <br><br>
        <a href="upload_image.php">Upload More Images</a>
    </div>

</body>
</html>
