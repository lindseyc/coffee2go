<?php
require_once("model/cart.php");
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

class Model {

	public function __construct()  { 

    if (!isset($_SESSION['cart'])) {
      	$_SESSION['cart'] = new ShoppingCart();
 	  }
  } 

	public function updateCart($type, $quantity) {
  		
        $displayName = ShoppingCart::$drinkTypes[$type];
       
        if ($displayName && is_numeric($quantity) && $quantity > 0) {    
            $_SESSION["cart"]->order($type, $quantity);
            $message = "$quantity boxes of $displayName added to shopping cart";
        }
        else if (!$displayName) {
            $message = "invalid, invalid selection";
        }
        else if (!is_numeric($quantity)) {
           $message = "invalid, quantity not numeric";
        }
        else if ($quantity < 1) {
            $message = "invalid, quantity less than 1";
        }
		

	       	return $message;
 	}

 	public function getCart() {
 		return $_SESSION["cart"]->getOrder();
 	}

    public function getCustomer() {
        return $_SESSION["cart"]->getCustomer();
    }

 	public function addToCart($type, $quantity) {
 		// todo

 	}
    public function getDrinkTypes () {
        return ShoppingCart::$drinkTypes;
    }
 
}

?>