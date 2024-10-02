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
     <h1>personnel</h1>

<table cellpadding="10" align="center" width="70%" border="">
		
		</tr>
		<tr bgcolor="#a9d3db" align="">
			<th><h2>Lastname</h2></th>
			<th><h2>Name</h2></th>
			<th><h2>Role</h2></th>
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Doe</td>
			<td>John</td>
			<td>Doctor</td>
		
		</tr>
	</tr>
		<tr bgcolor="#82b9cf">
			<td>Smith</td>
			<td>Jane</td>
			<td>Nurse</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Lee</td>
			<td>David</td>
			<td>Pharmacist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Brown</td>
			<td>Emily</td>
			<td>Lab Technician</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Johnson</td>
			<td>Michael</td>
			<td>Radiologist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Williams</td>
			<td>Sarah</td>
			<td>Surgeon</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Jones</td>
			<td>Christopher</td>
			<td>Therapist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Taylor</td>
			<td>Ashley</td>
			<td>Administrator</td>
		
		</tr>
          </tr>
		<tr bgcolor="#82b9cf">
			<td>Clark</td>
			<td>Matthew</td>
			<td>Receptionist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Harris</td>
			<td>Jennifer</td>
			<td>Hygienist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Wilson</td>
			<td>Thomas</td>
			<td>Assistant</td>
		
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Baker</td>
			<td>Nicole</td>
			<td>Dietician</td>
		
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Carter</td>
			<td>Daniel</td>
			<td>Anesthesiologist</td>
		
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Rogers</td>
			<td>Elizabeth</td>
			<td>Cardiologist</td>
		
		</tr>
		</tr>
		<tr bgcolor="#82b9cf">
			<td>Hill</td>
			<td>Joshua</td>
			<td>Neurologist</td>
		
		</tr>

		<?php 
        $sql = "SELECT * FROM personnel";
		$query = mysqli_query($conn, $sql);
        if(!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>" . $result["lastname"] . "</td>";
                echo "<td>" . $result["firstname"] . ", " . $result['role'] . "</td>";
                echo "<td>" . ($result["role"] === 'D' ? 'Doctor' : ($result["role"] === 'N' ? 'Nurse' : ($result["role"] === 'P' ? 'Pharmacist' : 'Lab Technician'))) . "</td>";
                echo "</tr>";
            }
        }
?>

</body>
</html>