<?php

	include_once("model/model.php");
	include_once("view/view.php");
	include_once("dbconn.php");

	$connection = connect_to_db("motley");
	require_once("model/queries.php");

	if (session_status() != PHP_SESSION_ACTIVE) {
		session_start();
	}

	class Controller {
		public $model, $view;

		public function __construct() {
			$this->model = new Model();
			$this->view = new View($this->model);

			//call model to load the drinkTypes from the database (Jason)

		}



/*
	if(isset($_POST["submit"])){

		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phone = mysqli_real_escape_string($conn, $_POST['phone']);
		$carrier = mysqli_real_escape_string($conn, $_POST['carrier']);

		echo $name . ", " . $email . ", " . $phone . ", " . $carrier;

	//customer id
	mysqli_stmt_execute($selectCustomer);
    //execute query to select customer
    $selectCustomer -> bind_result($cid);
    //if has something, customer is in the db
    if($selectCustomer -> fetch()){
        echo '<br> your current customer id is ' . $cid . ' <br>';
    }
    else{ //customer is not in the database (query returned nothing)
        mysqli_stmt_execute($insertCustomer);
        $cid = mysqli_stmt_insert_id($insertCustomer);
        echo 'your new customer id is '. $cid .' <br>';
    }
    //close the connections
    mysqli_stmt_close($selectCustomer);
    mysqli_stmt_close($insertCustomer);

	//order id
     mysqli_stmt_execute($insertOrder);
     $orderid = mysqli_stmt_insert_id($insertOrder);
     echo 'your order id is '. $orderid .' <br>';
     mysqli_stmt_close($insertOrder);

	//insert the drinks from the order??
 		foreach($_SESSION['cart']->order as $drink => $value){
        	$type = $drink; ???
        	$quantity = $value;
        	$price = (5 * $value);
       		mysqli_stmt_execute($insertDrink);

    }

        mysqli_stmt_close($insertDrink);

	//destroy the session and unset vars
	unset($_SESSION);
	session_destroy();



	}
*/



		public function invoke() {
			// call to model to get drink types


			$this->view->renderOrderForm();
			// $this->view->renderOrderForm($drinkTypes);
			// $drinkType = $this->model->getDrinkTypes();

			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] != null) {

				print_r('adding to cart');
				//display the post
				print_r($_POST);
				$quantity = $_POST["quantity"];
				$type = $_POST["type"];

				//validate form here??


				//mysqli sttmnts?


				//print_r('adding to cart');
				//display the post
				echo "(in controller) The post is: ";
				print_r($_POST);
				//$quantity = $_POST["quantity"];
				//$type = $_POST["type"];

				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$carrier = $_POST["carrier"];

				echo "name = " . $name . " email = " . $email . " phone = " . $phone . " carrier = " . $carrier;

				$result = $this->model->updateCart($quantity, $quantity);

				foreach(ShoppingCart::$alltypes as $type => $quantity){
					if (is_numeric($quantity) && $quantity > 0){

						$_SESSION['cart']->order($type, $quantity);

					}
				}

				//echo "name = " . $name . " email = " . $email . " phone = " . $phone . " carrier = " . $carrier;
				echo '<br/>';
				//if($drinkSelected){
					//$type = trim($_POST["dropdown"]);
					//$quantity = trim($_POST["quantity"]);
					//TODO
					//$quantity = 2;
					// $message = "";
					// //TODOOO
					// $displayname = "latte"; //ShoppingCart::$drinktypes[0];
					// if($displayname && is_numeric($quantity) && $quantity > 0){
					// 	$_SESSION['cart']->order($type, $quantity);

					// 	$message = "Your $quantity drink(s) added to shopping cart";
					// }
					// else if(!$displayname){
					// 	$message = "error";
					// }
				//}

				//add to the cart not update: change once this can be called on the model
				$result = $this->model->updateCart($type, $quantity);


				// $cust = $this->model->addCustomer();

				if(preg_match('/invalid/', $result)) {
					echo $result;
				}
				else {
					$shoppingCart = $this->model->getCart();
					$this->view->renderCart($shoppingCart);
				}
			}
		}

		public function confirm() {
			$this->view->renderCart($shoppingCart);

			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["confirm"] != null) {
				// form has been confirmed, send order to employee
				//email customer
				//store customer/order/drink info in db
				$this->view->renderConfirmation();
			}
		}
	}
?>
