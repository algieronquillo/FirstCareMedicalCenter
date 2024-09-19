<?php
    
?>
<body>
<?php
    
?>
    <h1> Student List </h1>
    <table border="1" align="center" cellspacing="0" cellpadding="10">
        <tr>
            <th> lastname </th>
            <th> name </th>
            <th> role </th>
        </tr>
    <?php 
        $sql = "SELECT * FROM personnel";
        $query = mysqli_query($conn, $sql);
        if(!$query) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
            while($result = mysqli_fetch_assoc($query)) {
                echo "<tr>" .$result["lastname"]  ."," .$result['name'] . "</td";
                echo "<td>" . $result["role"] . "</td>";
              
                //echo "<td> {$result["lastname"]}, {$result["name"]} </td>";
                // echo "<td>" . $result['role'] . "</td>";
                /*
                General Medicine
                Pediatrics
                Pharmacy
                Laboratory
                Radiology
                General Surgery
                Physical Therapy
                Administration
                Reception

                */
                echo "<td>" . date("input", strtotime($result["role"])) . "</td>";
                echo "</tr>";
            }
        }
    ?>
</body>
</html>