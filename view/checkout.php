<?php


require_once('model/cart.php');
session_start();

?>

<!DOCTYPE html>

<?php 

// //if session is starting then store an empty cart in it
// if(!isset($_SESSION['cart'])) {
// 	$_SESSION['cart'] = new ShoppingCart();
// }

// //if submit has been clicked then destroy session
// if(isset($_POST['order'])) { // has to receive from the controller
// 	unset($_SESSION);
// 	session_destroy();
// }

?>
<html lang="en">

<head>
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
	<title> Checkout </title>
</head>

<body>
	<h2> Checkout </h2>

	<!-- Display order and customer info -->

	<p> your information </p>
	<!-- customer info (can not edit, maybe in a later feature) -->
	<?php

	?>

	<p>Your Order: </p>
	<!-- table for drink order -->
	<?php
	echo '<table>';
	echo '<tr>';
		echo '<td>Drink</td>';
		echo '<td>Price</td>';
	foreach ($shoppingCart as $drink => $price) {
		echo '<tr>';
		echo '<td>';
		print_r('drink = ' . $drink);
		echo '</td>';
		echo '<td>'
		print_r($price);
		echo '</td>';
		echo '</tr>';
	}
	echo "</table>"
	?>

	

		
	
	<button class="brown" name="confirm" type="submit" value="submit">Confirm</button>

</body>

</html>