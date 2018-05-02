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
	<link href="view/main.css" type="text/css" rel="stylesheet"/>
	<title> Reports Page </title>
</head>

<body>
  <h1>Coffee stats</h1>

<?php
include("dbconn.php");
$connection = connect_to_db("motley");

// Show drinks ordered within 30 minutes
echo "<h2> Drinks ordered within 30 minutes:</h2>";
$query = "SELECT customer.name AS Name, drinks.name AS Drink,
          drinks.price AS Price, CAST(orders.dateCreated AS TIME) AS ordertime
          FROM drinks
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
                echo "<th>Order Time</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Drink'] . "</td>";
                echo "<td>" ."$" . $row['Price'] . "</td>";
                echo "<td>" . $row['ordertime'] . "</td>";
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

// Most popular drink
echo "<h2> Most popular drink:</h2>";
$query = "SELECT name, SUM(quantity) AS 'Num Ordered' FROM drinks
          ORDER BY SUM(quantity)";

if($result = mysqli_query($connection, $query)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
              echo "<th>Drink</th>";
              echo "<th>Total Ordered</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['Num Ordered'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No orders. Go sell some coffee!";
    }
} else{
    echo "ERROR: Could not able to execute $query; " . mysqli_error($connection);
}


// Best customer
echo "<h2> Best customer:</h2>";
$query = "SELECT customer.name, SUM(orders.price) AS Revenue
          FROM orders
          JOIN customer ON orders.customer_id=customer.id
          GROUP BY orders.customer_id
          ORDER BY Revenue
          DESC
          LIMIT 1";

if($result = mysqli_query($connection, $query)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
              echo "<th>Customer</th>";
              echo "<th>Revenue</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . "$" . $row['Revenue'] . "</td>";
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


  <p>
    <a href='index.php'> Order more coffee! </a>
  </p>

    <footer>
        <hr/>
        <p class='motto' style="font-weight:bold;">The Motley Coffeehouse</p>
        <p class="motto"> - an intersectional, political, and feminist coffeehouse run by the students of Scripps College - </p>
        <p>345 E. 9th Street <br/> Scripps College <br/> Claremont, CA 91711</p>
        <p>(909) 607-3967 </p>
    </footer>

</body>
</html>
