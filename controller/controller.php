<?php

	include_once("model/model.php");
	include_once("view/view.php");
	include_once("dbconn.php");


	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	//if the cart is not there, call create cart function from model

	class Controller {
		public $model, $view;

		public function __construct() {
			$this->model = new Model();
			$this->view = new View($this->model);
		}


		// public function redirect($location){
		// 	header("location: " . $location);

		// 	exit;
		// }


		public function invoke() {

			$drinktypes = Array(
								ShoppingCart::$drinktypes,
								ShoppingCart::$teatypes,
								ShoppingCart::$smoovtypes
							);
			$this->view->renderOrderForm($drinktypes);
			//print_r($drinktypes);
			//$drinkType = $this->model->getDrinkTypes();

			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

				print_r('adding to cart: ');
				//display the post
				print_r($_POST);
				$quantity = $_POST["quantity"];
				$type = $_POST["type"];


					echo "retrieve cart from model : ";
				print_r($this->model->getCart());
				echo "<br/>";


				//display the post
				echo "<br /><br />(in controller) The post is: ";
				print_r($_POST);
				echo "<br/>";

				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$carrier = $_POST["carrier"];

				echo "name = " . $name . " email = " . $email . " phone = " .
				$phone . " carrier = " . $carrier . "<br /> <br />" ;

				//DB. Add customer
				$this->model->addCustomertoDb($name, $phone, $email, $carrier);

				$result = $this->model->updateCart($quantity, $quantity);


				$_SESSION['cart']->order($type, $quantity);
				$post = $_POST;
				unset($post['dropdown']);
				unset($post['submit']);

				//Initialize var.

				foreach($post as $key => $value) {
					if($key == "name" || $key == "carrier" || $key == "phone" || $key == "email"){
						echo "adding $key and $value to customer <br/>";
						$this->model->addCustomer($key,$value);
						//$_SESSION['cart']->addCustomer($key, $value);
					}
					else {
						$key = ShoppingCart::$displaynames[$key];
						if($value > 0){
							echo "adding $key and $value to drinkOrder <br/>";
							$this->model->order($key, $value);
							//$_SESSION['cart']->order($key, $value);
						}
					}
				}
				echo '<br/>';

					//echo "adding $key and $value to model";
					//$result = $this->model->updateCart($key, $value);
					$result = "nothing right now";


				echo "retrieve cart from model : ";
				print_r($this->model->getCart());


				if(preg_match('/invalid/', $result)) {
					echo $result;
				}
				else {

					$shoppingCart = $this->model->getCart();
					//replace the view instead of rendering it at the bottom
					$this->view->renderCart($shoppingCart);
					//$this->view->renderCart("view/checkout.php");
					//print_r(__DIR__);
					//$this->_redirect('./view/checkout.php');
				}
			}
			//render it anyways (for testing)
			//$this->view->renderCart($shoppingCart);

		}

		public function confirm() {
			//$this->view->renderCart($shoppingCart);
			echo "in confirm";
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm"])) {
				echo "in the confirm: <br />";

				//DB. Add order

				$mycust = $this->model->getCustomer();
				echo "cust name is: " . $mycust['name'];
				echo "cust email is " . $mycust['email'];

				// $cId = $this->model->getCustId($mycust['name'], $mycust['email']);

				$timedrop = $_POST['timeDrop'];
				$date = $_POST['timestamp'];
				$orderPrice = $totalPrice;

				$this->model->addOrdertoDb($customerId, $orderPrice, $date, $timedrop);

				print_r($_POST);
				$post = $_POST;
				unset($post['confirm']);
				//to be implemented
				/*

				*/
				// form has been confirmed, send order to employee
				//email customer
				//store customer/order/drink info in db
				//echo "redirecting...";
				$this->view->renderConfirmation();
				//$this->view->renderConfirmation("view/confirmation.php");
				//echo "redirected...";
				$this->model->clearCart();
				//print_r($this->model->getCart());
			}
		}
	}

?>
