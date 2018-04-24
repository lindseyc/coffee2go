<?php

class ShoppingCart {

	//put the drink types and prices in this array like gsc
	public static $drinkTypes = Array(
);

	private $order;
	private $customer;

	//create array for order and customer
	public function __construct() {
		$this->order = Array();
		$this->customer = Array();
	}

	public function getOrder() {
		return $this->order;
	}

	public function getCustomer() {
		return $this->customer;
	}

	public function order($type, $quantity) {
		 $currentQuantity = $this->order[$type];
        $currentQuantity += $quantity;
        $this->order[$type] = $currentQuantity;
	}

	public function addCustomer($key, $value) {
		//add information about customer to their customer array (name = "john")
		$this->customer[$key] = $value;
	}

	public function updateCart($type, $quantity) {
		$this->order[$key] = $value;
	}

	public function remove($type) {
       unset($this->order[$type]);
     }

     public function display() {
     	$array = $this->order;
     	print_r("drink(s) = " . $array);
     	print_r("customer = " . $this->customer);
     }

}

?>
