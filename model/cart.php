<?php

class ShoppingCart {

	//put the drink types and prices in this array like gsc
	public static $drinkTypes = Array();

	private $order;

	public function __construct() {
		$this->order = Array();
	}

	public function getOrder() {
		return $this->order;
	}

	public function order($type, $quantity) {
		 $currentQuantity = $this->order[$type];
        $currentQuantity += $quantity;
        $this->order[$type] = $currentQuantity;
	}

	public function updateCart($type, $quantity) {
		$this->order[$key] = $value;
	}

	public function remove($type) {
       unset($this->order[$type]);
     }

     public function display() {
     	$array = $this->order;
     	print_r($array);
     }

}

?>