<?php

class View {

	//construct the model
	public function __construct($model) {
		$this->model = $model;
	}

	//display the checkout
	public function renderCart($shoppingCart){
		include_once("checkout.php");
	}

	//display the order page
	public function renderOrderForm($drinkTypes){
		include_once("orderpage.php");
	}

}