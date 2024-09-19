<?php

?>
<body>

    <h1> Insert personnel </h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td> LRN </td>
                <td> <input type="text" name="lastname" required> </td>
            </tr>
            <tr>
                <td> Last Name </td>
                <td> <input type="text" name="name" required> </td>
            </tr>
            <tr>
                <td> First Name </td>
                <td> <input type="text" name="role" required> </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <button type="submit" name="insert_personnel"> Insert Student </button>
                </td>
            </tr>
    </form>
    <?php
        if(isset($_POST['insert_student'])) {
            $lastname = $_POST['lrlastname'];
            $name = $_POST['name'];
            $role = $_POST['role'];
            
            $sql = "SELECT * FROM personnel WHERE lastname = '$lastname'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('personnel already exists'); </script>";
            } else {
                $sql = "INSERT INTO students (lastname, name, role) VALUES ('$lastname', '$name', '$role')";
                $query = mysqli_query($conn, $sql);
                if($query) {
                    echo "<script> alert('personnel inserted successfully'); window.location='personnel.php';</script>";
                } else {
                    echo "<script> alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "'); </script>";
                }
            }
                
        }
    ?>
</body>
</html>