<?php
include("db_connection.php");
      
        
?>
</head>
<body>
<?php
include("menu.php");
?>
    <center>
        <h2>Insert New Personnel</h2>
        <form method="post" action="insert_personnel.php">
            <table border=5 align="center" cellspacing="0" cellpadding="15">
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lastname" required></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="firstname" required></td>
                </tr>
                <tr>
                    <td>Role</td>   

                    <td><input type="text" name="role" required></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" required></td>
                </tr>
                <tr>
                    <td   
 colspan="2">
                        <button type="submit" name="insert_personnel">Insert Personnel</button>
                    </td>
                </tr>
            </table>
        </form>
    </center>

    <?php
        if(isset($_POST['personnel.php'])) {
            $lastname = $_POST['lastname'];
            $name = $_POST['name'];
            $role = $_POST['role'];
            $address = $_POST['address'];

            $sql = "SELECT * AND FROM personnel WHERE lastname = '$lastname' name = '$name'";
            $query = mysqli_connect($conn, $sql);
            if(mysqli_num_rows($query) > 0) {
                echo "<script> alert('Personnel already exists'); </script>";
            } else {
                $sql = "INSERT INTO personnel ( lastname, name, role,) VALUES ( '$lastname', '$name', '$role')";
                $query = mysqli_connect($conn, $sql);
                if($query) {
                    echo "<script> alert('Personnel inserted successfully'); window.location='personnel.php';</script>";
                } else {
                    echo "<script> alert('Error: " . $sql . "<br>" . mysqli_error($conn) . "'); </script>";
                }

            }
                
        }
    ?>


</body>
