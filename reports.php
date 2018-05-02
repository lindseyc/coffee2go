<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<style> /*style for header and footer*/
		header, footer {
			padding: 1em;

    		clear: left;
    		text-align: center;
        }
        button {
            box-shadow: 0 4px #999;
            padding:10px;
        }
        .motto {
            font-family: "Palatino", "Garamond", "Times", serif
        }
	</style>
	<title> Reports Page </title>
</head>

<body>

<?php
include("dbconn.php");
$connection = connect_to_db("motley");

// Show drinks ordered within 30 minutes
echo "<h1> Drinks ordered within 30 minutes:</h1>";
$query = "SELECT customer.name AS Name, drinks.name AS Drink, drinks.price
          AS Price FROM drinks
          JOIN orders ON orders.id = drinks.orderId
          JOIN customer ON customer.id = drinks.customerId
          WHERE dateCreated >=
                DATE_ADD(CURRENT_TIMESTAMP, INTERVAL -30 MINUTE)";

if($result = mysqli_query($connection, $query)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Customer</th>";
                echo "<th>Drink</th>";
                echo "<th>Price</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Drink'] . "</td>";
                echo "<td>" ."$" . $row['Price'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No recent drinks";
    }
} else{
    echo "ERROR: Could not able to execute $query; " . mysqli_error($connection);
}
// Close connection
mysqli_close($connection);




?>

</body>
</html>
