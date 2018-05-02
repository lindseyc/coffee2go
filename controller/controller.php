<?php

	include_once("model/model.php");
	include_once("view/view.php");
	include_once("dbconn.php");


	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}


	class Controller {
		public $model, $view;

		public function __construct() {
			$this->model = new Model();
			$this->view = new View($this->model);
			$this->mail = new Mail();
		}


		//the order page has been submitted
		public function invoke() {

			$drinktypes = Array(
								ShoppingCart::$drinktypes,
								ShoppingCart::$teatypes,
								ShoppingCart::$smoovtypes
							);
			//display the order form
			$this->view->renderOrderForm($drinktypes);

			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$carrier = $_POST["carrier"];

				// echo "name = " . $name . " email = " . $email . " phone = " .
				$phone . " carrier = " . $carrier . "<br /> <br />" ;

				//DB. Add customer
				// $this->model->addCustomertoDb($name, $phone, $email, $carrier);

				// $result = $this->model->updateCart($quantity, $quantity);


				// $_SESSION['cart']->order($type, $quantity);
				$post = $_POST;
				unset($post['dropdown']);
				unset($post['submit']);

				$drinkList = array();
				foreach($post as $key => $value) {
					if($key == "name" || $key == "carrier" || $key == "phone" || $key == "email"){
						// adding $key and $value to customer
						$this->model->addCustomer($key,$value);
					}
					else {
						$key = ShoppingCart::$displaynames[$key];
						if($value > 0){
							// adding $key and $value to drinkOrder
							$this->model->order($key, $value);
							$drinkList[$key] = $value;
						}
					}
				}

					$result = "nothing right now";



				if(preg_match('/invalid/', $result)) {
					echo $result;
				}
				else {

					$shoppingCart = $this->model->getCart();
					//replace the view instead of rendering it at the bottom
					$this->view->renderCart($shoppingCart);
					//$this->view->renderCart("view/checkout.php");
					//$this->_redirect('./view/checkout.php');
				}
			}
			//render it anyways (for testing):
			//$this->view->renderCart($shoppingCart);

		}

		//the checkout page has been submitted/confirmed
		public function confirm() {
			//$this->view->renderCart($shoppingCart);
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm"])) {


				//get customer array from model
				$mycust = $this->model->getCustomer();
				
				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$carrier = $_POST['carrier'];
				$date = $_POST['timestamp'];
				$timedrop = $_POST['timeDrop'];
				$email_text_orboth = $_POST['confirmtype'];

				//DB actions, add to db
				$this->model->addAlltoDb($name, $phone, $email, $carrier,
							$date, $timedrop);


				$post = $_POST;
				unset($post['confirm']);
				//to be implemented
				/*

				*/
				// form has been confirmed, send order to employee
				//email customer
				$this->mail->sendMail($email, $phone, $carrier, $email_text_orboth, $timedrop);
				//store customer/order/drink info in db
				//echo "redirecting...";
				$this->view->renderConfirmation();
				//$this->view->renderConfirmation("view/confirmation.php");
				//echo "redirected...";

				//clear the cart
				$this->model->clearCart();
			}
		}
	}

?>
