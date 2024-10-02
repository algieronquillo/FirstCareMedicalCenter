<html style="background: url(https://static.vecteezy.com/system/resources/thumbnails/009/213/272/small_2x/healthcare-and-medical-background-with-cardiogram-line-free-vector.jpg);" style="background-size: 200;">
<head>

<?php
    include("db_connection.php");
?>
</head>
<body>
<?php
        include("style.php");

    include("menu.php");
?>

<h1>location</h1>
<table cellpadding="15" align="center" width="70%" border="5">
		</tr>
		<tr bgcolor="#a9d3db" align="">
			<th><h2>City</h2></th>
            <th><h2>Address</h2></th>

		</tr>
		</tr>
   <tr bgcolor="#82b9cf">
            <td>Manila City</td>
			<td>Philippine General Hospital</td>

   <tr bgcolor="#82b9cf">
           <td>Quezon City</td>  
           <td>St. Luke's Medical Center</td>
    <tr bgcolor="#82b9cf">
        <td>Makati City</td>
       <td>Makati Medical Center</td>
   <tr bgcolor="#82b9cf">
        <td>Davao City</td>
       <td>Cebu Doctors' University Hospital</td>
     </tr>  
     <?php 
    // Database connection
    $conn = mysqli_connect("localhost", "my_username", "my_password", "my_database");
    
    // Check if connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query to select data from the location table
    $sql = "SELECT * FROM location";
    $query = mysqli_query($conn, $sql);

    // Error handling
    if (!$query) {
        echo "Error: " . mysqli_error($conn);
    } else {
        // Check if there are any results
        if (mysqli_num_rows($query) > 0) {
            while ($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result["City"]) . "</td>";
                echo "<td>" . htmlspecialchars($result["Address"]) . "</td>";
                echo "</tr>";
            }
        }
    ?>



</body>
</html>