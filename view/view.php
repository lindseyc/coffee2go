<?php

class View {

	public function __construct($model) {
		$this->model = $model;
	}

	public function renderCart($shoppingCart){
		include_once("checkout.php");
	}

	public function renderOrderForm($drinkTypes){
		include_once("orderpage.php");
	}
}