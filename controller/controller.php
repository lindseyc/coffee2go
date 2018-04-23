<?php
	
	include_once("../model/model.php");
	include_once("../view/view.php");
	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	class Controller {
		public $model, $view;

		public function __construct() {
			$this->model = new Model();
			$this->view = new View($this->model);

		}

		public function invoke() {
			$this->view->renderOrderForm($drinkTypes);
			if($_SERVER["REQUEST_METHOD"] == "POST" && $POST_["submit"] != null)
			//display checkout
			//if(isset($_POST("submit"))){
			//		call model function to add to db
			//}
		}



			$drinkType = $this->model->getDrinkTypes();
			//$this->view->renderOrderForm($drinkTypes);
			if($_SERVER["REQUEST_METHOD"] == "POST" && $POST_["update"] != null) {

				$quantity = $_POST["quantity"];
				$type = $_POST["type"];
				$result = $this->model->updateCart($variety, $quantity);

				if(preg_match('/invalid/', $result)) {
					echo $result;
				}
				else {
					$shoppingCart = $this->model->getCart();
					$this->view->renderCart($shoppingCart);
				}
			}


		}
	}
?>