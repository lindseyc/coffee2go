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
	<link href="main.css" type="text/css" rel="stylesheet"/>
	<title> Checkout </title>
</head>

<body>
	<h2> Checkout </h2>

	<p>Your Order: </p>


	<?php
	foreach ($shoppingCart as $drink => $price) {
		print_r('drink = ' . $drink);
	}

		?>
	<!-- Display order and customer info -->
	<?php
	?>

</body>

</html>