<?php

	include_once("model/model.php");
	include_once("view/view.php");
	include_once("dbconn.php");


	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}


	class Controller {
		public $model, $view;

		//create instance of the model and view and mail (automatic)
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

								
				$post = $_POST;
				unset($post['dropdown']);
				unset($post['submit']);

				$drinkList = array();
				//add customer and drink order to the model
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
					//render the checkout page
					$this->view->renderCart($shoppingCart);
				}
			}
			

		}

		//the checkout page has been submitted/confirmed
		public function confirm() {
			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm"])) {


				//get customer array from model
				//$mycust = $this->model->getCustomer();


				$name = $_POST['name'];
				$phone = $_POST['phone'];
				$email = $_POST['email'];
				$carrier = $_POST['carrier'];
				$date = $_POST['timestamp'];

				$timedrop = $_POST['timeDrop'];
				$email_text_orboth = $_POST['confirmtype'];

				//DB actions, add to db
				$this->model->addAlltoDb($name, $phone, $email, $carrier,
						 $timedrop);


			
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
