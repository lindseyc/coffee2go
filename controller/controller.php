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
			$this->view->renderOrderForm($drinkTypes);
			$drinkType = $this->model->getDrinkTypes();

			if($_SERVER["REQUEST_METHOD"] == "POST" && $POST_["submit"] != null) {
			//display checkout
			//if(isset($_POST("submit"))){
			//		call model function to add to db
			//}
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