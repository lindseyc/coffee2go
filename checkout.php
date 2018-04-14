<?php


session_start();

?>

<!DOCTYPE html>

<?php 

//if session is starting then store an empty cart in it
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = new ShoppingCart();
}

//if submit has been clicked then destroy session
if(isset($_POST['submit'])) {
	unset($_SESSION);
	session_destroy();
}

?>

<html lang="en">

<head>
	<title> Checkout </title>
</head>
<body>
	<h2> Checkout </h2>

	<p>Your Order: </p>

	<!-- Display order and customer info -->
	<?php
	?>




