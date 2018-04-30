<?php

class ShoppingCart {

	//put the drink types and prices in this array like gsc

	public static $drinktypes = Array(	"latte" => 3.50, 
										"black coffee" => 2.00,
										"espresso" => 4.00	
									 );
	public static $teatypes = Array(	"black tea" => 1.50,
										"irish breakfast" => 1.75,
										"earl grey" => 1.75,
										"green tea" => 1.50
									);
	public static $smoovtypes = Array(	"strawberry" => 4.00,
										"straw-nana" => 4.75,
										"mango" => 5.00
									);

	public static $alltypes = Array(	"strawberry" => 4.00,
										"straw-nana" => 4.75,
										"mango" => 5.00,
										"black tea" => 1.50,
										"irish breakfast" => 1.75,
										"earl grey" => 1.75,
										"green tea" => 1.50,
										"latte" => 3.50, 
										"black coffee" => 2.00,
										"espresso" => 4.00
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
		 //may need to change
        $currentQuantity += $quantity;
        $this->order[$type] = $currentQuantity;
	}

	public function addCustomer($key, $value) {
		//add information about customer to their customer array (name = "john")
		$this->customer[$key] = $value;
	}

	public function updateCart($type, $quantity) {
		$this->order[$type] = $quantity;
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
