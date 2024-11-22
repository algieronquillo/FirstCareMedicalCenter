<?php
    include("db_connection.php");
?>

<body>
    <?php
        include("style.php");
        include("menu1.php");
    ?>
    <center>
        <h1>Assign Medical Center to Personnel</h1>
        <form method="post" enctype="multipart/form-data">
            <table border="1" align="center" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Personnel</td>
                    <td>
                        <select name="personnel">
                            <option value=""> -- SELECT A PERSONNEL --</option>
                            <?php
                            $sql = "SELECT * FROM personnel ORDER BY lastname";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    // Concatenate first name and last name to form full name
                                    $full_name = $result['firstname'] . ' ' . $result['lastname'];
                                    echo "<option value='{$result['personnel_id']}'>$full_name, {$result['profile_image']}, {$result['profile_image']} {$result['role']}, {$result['specialty']}, </option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Medical Center</td>
                    <td>
                        <select name="medicalcenter">
                            <option value=""> -- SELECT A MEDICAL CENTER --</option>
                            <?php
                            $sql = "SELECT * FROM medicalcenter ORDER BY location";
                            $query = mysqli_query($conn, $sql);
                            if (!$query) {
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($result = mysqli_fetch_assoc($query)) {
                                    echo "<option value='{$result['center_id']}'>{$result['location']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Upload Image</td>
                    <td>
                        <input type="file" name="personnel_image" accept="image/*" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit" name="assign_personnel" class="button green">Assign</button>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['assign_personnel'])) {
            // Retrieve selected personnel and medical center
            $personnel_id = mysqli_real_escape_string($conn, $_POST['personnel']);
            $medicalcenter_id = mysqli_real_escape_string($conn, $_POST['medicalcenter']);
            
            // Handle image upload
            if (isset($_FILES['personnel_image']) && $_FILES['personnel_image']['error'] == 0) {
                $image_name = $_FILES['personnel_image']['name'];
                $image_tmp = $_FILES['personnel_image']['tmp_name'];
                $image_folder = 'uploads/' . $image_name;

                // Move the uploaded image to the 'uploads' folder
                move_uploaded_file($image_tmp, $image_folder);
            } else {
                $image_name = null; // If no image is uploaded, set it to null
            }

            // Insert the data into medicalpersonnel table
            $sql = "INSERT INTO medicalpersonnel (personnel_id, center_id, profile_image) 
                    VALUES ('$personnel_id', '$medicalcenter_id', '$image_name')";

            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Personnel has been assigned to a medical center'); window.location='personnel.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>
    </center>
</body>
</html>
