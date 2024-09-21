<html style="background: url(https://static.vecteezy.com/system/resources/thumbnails/009/213/272/small_2x/healthcare-and-medical-background-with-cardiogram-line-free-vector.jpg);" style="background-size: 200;">
<head>
<?php
    include("db_connection.php");
?>
</head>
<body>
<?php
    
    include("menu.php");
?>
    <h1> Insert Students </h1>
    <form method="post">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td> last name </td>
                <td> <input type="text" name="lastname" required> </td>
            </tr>
            <tr>
                <td> Name </td>
                <td> <input type="text" name="name" required> </td>
            </tr>
            <tr>
                <td> role </td>
                <td> <input type="text" name="role" required> </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <button type="submit" name="insert_personnel"> Insert Student </button>
                </td>
            </tr>
    </form>
    <?php
        if(isset($_POST['insert_personnel'])) {
            $lastname = $_POST['lastname'];
            $name = $_POST['name'];
            $role = $_POST['role'];
           

            $sql = "SELECT * FROM personnel WHERE lastname = '$lastname'";
            $query = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('Student already exists'); </script>";
            } else {
                $sql = "INSERT INTO personnel (lastname, name, role) VALUES ('$lastname', '$name','$role',) ";
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