<!DOCTYPE html>
<html lang="en">

<?php
    include("db_connection.php");
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>


<?php
    include("style.php");
    include("menu.php");
    ?>


    <h2>Upload a File</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <!-- File input field -->
        <label for="upload_file">Choose a file to upload:</label>
        <input type="file" name="file_upload" id="upload_file" required><br><br>
        
        <!-- Submit button -->
        <button type="submit" name='process-upload'>Submit</button>
    </form>

      <?php
       if(isset($_POST['process-upload'])) {
        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";
       }
       //*

       $filename = $_FILES['file_upload']['name'];
       $filetype = $_FILES['file_upload']['type'];
       $tmpname = $_FILES['file_upload']['tmp_name'];
       $filesize = $_FILES['file_upload']['size'];

       //Allowed File Types to be processed.
       $allowedFileTypes = ['image/jpg', 'image/png'];
       if(!in_array($filetype, $allowedFileTypes)) {
       }
?>

</body>
</html>