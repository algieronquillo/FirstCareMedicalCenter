<html>

<?php
    include("db_connection.php");
?>
</head>
<body>
<?php
        include("style.php");

    include("menu.php");
?>
<center>
<h1>Location</h1>
<table cellpadding="15" align="center" width="70%" border="5">
		</tr>
		<tr>
			<th><h2>Mediacalcenter</h2></th>
            

		</tr>
	<TAble cellpadding="15" align="center" width="70%" border="5">
     <nav>
    <ul>
        
        <li><a href="manilacity.php">Manila City, Philippine General Hospital</a></li>
        </ul>
        </nav>

        <nav>
    <ul>
        <li><a href="quezoncity.php">Quezon City, St. Luke's Medical Center</a></li>
        </ul>
        </nav>

        <nav>
    <ul>
        <li><a href="makaticity.php">Makati City, Makati Medical Center</a></li>
        </ul>
</nav>
        
<nav>
    <ul>
        <li><a href="davaocity.php">Davao City, Doctors' University Hospital</a></li>
        
       
        if (mysqli_query($conn, $sql)) {
            
            echo "<script>alert('Location has been added'); window.location= 'location.php'; </script>";
        } else {
            echo "<script>alert('Error adding location: " . mysqli_error($conn) . "');</script>";
        }
    }
    ?>

    </center>
    
</body>
</html>