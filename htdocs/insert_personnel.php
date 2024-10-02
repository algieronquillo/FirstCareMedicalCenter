<html style="background: url(https://static.vecteezy.com/system/resources/thumbnails/009/213/272/small_2x/healthcare-and-medical-background-with-cardiogram-line-free-vector.jpg);" style="background-size: 200;">
<head>
    <?php
include("db_connection.php");
?>
</head>
<?php
        include("style.php");

    include("menu.php");
?>
<body>
<h2>Insert New Personnel</h2>
    <form method="post" action="insert_personnel.php">
        <table border=1 align="center" cellspacing="0" cellpadding="10">
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="lastname" required></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><input type="text" name="role" required></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name ="City" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input type="text" name ="Address" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="insert_personnel">insert Personnel</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
// Handle personnel insertion
if (isset($_POST['insert_personnel'])) {
    $lastname = $_POST['lastname'];
    $name = $_POST['name'];
    $role = $_POST['role'];
    $City =$_POST['City'];
    $Address =$_POST['Address'];

    
    $sql = "SELECT * FROM personnel WHERE lastname = '$lastname' AND name = '$name'";
    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) == 1) {
        echo "<script> alert('personnel already exists'); </script>";
    } else {
        // code for insert personnel
    }

    




    $sql = "SELECT * FROM personnel WHERE lastname = '$lastname' AND name = '$name'";
    $query = mysqli_query($conn, $sql);
    if (isset($_POST['insert_personnel'])) {
        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        $City = $_POST['City']; // Get City input
        $Address= $_POST['Address'];
       {
            echo "<script> alert('personnel already exists'); </script>";
        } 
        $sql = "INSERT INTO personnel (lastname, name, role, specialty) VALUES ('$lastname', '$name', '$role', '$City','$Address')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "<script> alert('Personnel inserted successfully'); window.location='personnel.php';</script>";
            
        } else {
            echo "<script> alert('Error: " . mysqli_error($conn) . "'); </script>";
        }
    }
    
}
?>
    
    </body>
</html>