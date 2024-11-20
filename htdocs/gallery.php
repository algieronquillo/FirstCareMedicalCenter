<?php
include("db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallery</title>
    <style>
    /* Gallery styling */
    .gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .gallery img {
        width: 50px;
        height: 50px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
</style>
</head>
<body>
    <h2>Image Gallery</h2>
    <div class="gallery">
        <?php
        // Retrieve images from the database
        $stmt = $pdo->query("SELECT file_path FROM images");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $filePath = htmlspecialchars($row['file_path']);
            echo "<div><img src='$filePath' alt='Gallery Image'></div>";
        }
        ?>
    </div>

    <br><br>
    <a href="upload_image.php">Upload More Images</a>
</body>
</html>
