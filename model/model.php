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
        //for now hardcode in type
        //$type = "latte";
        //$quantity = 1;
        $displayName = ShoppingCart::$alltypes[$type];

        if ($displayName && is_numeric($quantity) && $quantity > 0) {
            $_SESSION["cart"]->updateCart($type, $quantity);
            //$_SESSION["cart"]->order($type, $quantity);
            $message = "$quantity boxes of $displayName added to shopping cart";
        }
        else if (!$displayName) {
            $message = "Invalid selection";
        }
        else if (!is_numeric($quantity)) {
           $message = "Invalid; quantity not numeric";
        }
        else if ($quantity < 1) {
            $message = "Invalid; quantity less than 1";
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
        //something is being added to the model without knowing??
        if($quantity > 0){
            $currentQuantity = $this->order[$type];
            $currentQuantity += $quantity;
            $this->order[$type] = $currentQuantity;
        }

 	}
    // public function getDrinkTypes () {
    //     $drinktypes = "SELECT name FROM drinktypes";
    // }

}

?>
