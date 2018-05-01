<?php

class View {

	//construct the model
	public function __construct($model) {
		$this->model = $model;
	}


	public function redirect($location){
		header("location: " . $location);

		exit;
	}

	//display the checkout
	public function renderCart($nextpage){
		//$this->redirect($nextpage);
		include_once("checkout.php");
	}

	//display the order page
	public function renderOrderForm($drinktypes){
		include_once("orderpage.php");
	}

	public function renderConfirmation() {
		//echo "in the render confirmation ";
		//$this->redirect($nextpage);
		include_once("confirmation.php");
	}
}