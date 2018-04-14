<?php


session_start();

?>

<!DOCTYPE html>

<?php 

if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = new ShoppingCart();
}