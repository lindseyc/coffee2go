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


			$drinktypes = Array(ShoppingCart::$drinktypes,
								ShoppingCart::$teatypes,
								ShoppingCart::$smoovtypes
							);
			$this->view->renderOrderForm($drinktypes);
			//print_r($drinktypes);
			//$drinkType = $this->model->getDrinkTypes();

			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] != null) {

				print_r('adding to cart: ');
				//display the post
				print_r($_POST);
				$quantity = $_POST["quantity"];
				$type = $_POST["type"];


					echo "retrieve cart from model : ";
				print_r($this->model->getCart());
				echo "<br/>";

				//mysqli sttmnts?


				//print_r('adding to cart');
				//display the post
				echo "<br /><br />(in controller) The post is: ";
				print_r($_POST);
				echo "<br/>";
				// $post = $_POST
				//$quantity = $_POST["quantity"];
				//$type = $_POST["type"];

				$name = $_POST["name"];
				$phone = $_POST["phone"];
				$email = $_POST["email"];
				$carrier = $_POST["carrier"];

				echo "name = " . $name . " email = " . $email . " phone = " .
				$phone . " carrier = " . $carrier . "<br /> <br />" ;

				$this->model->addCustomer($name,$phone,$email,$carrier  );

				$result = $this->model->updateCart($quantity, $quantity);


				$_SESSION['cart']->order($type, $quantity);
				$post = $_POST;
				unset($post['dropdown']);
				unset($post['submit']);


				foreach($post as $key => $value) {
					if($key == "name" || $key == "carrier" || $key == "phone" || $key == "email"){
						echo "adding $key and $value to customer <br/>";
						$_SESSION['cart']->addCustomer($key, $value);
					}
					else {
						$key = ShoppingCart::$displaynames[$key];
						if($value > 0){
							echo "adding $key and $value to drinkOrder <br/>";
							$_SESSION['cart']->order($key, $value);
						}
					}
				}



				// foreach(ShoppingCart::$alltypes as $type => $quantity){
				// 	if (is_numeric($quantity) && $quantity > 0){

				// 		$_SESSION['cart']->order($type, $quantity);

				// 	}

				// }

				echo '<br/>';


				//add to the cart not update: change once this can be called on the model

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
				}
			}
		}

		public function confirm() {
			//$this->view->renderCart($shoppingCart);

			if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["confirm"] != null) {

				//to be implemented
				/*

				*/
				// form has been confirmed, send order to employee
				//email customer
				//store customer/order/drink info in db
				$this->view->renderConfirmation();
			}
		}
	}

?>
