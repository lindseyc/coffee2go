<?php
require_once("model/cart.php");
include_once("dbconn.php");
$connection = connect_to_db("motley");

print_r($connection->error);
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

class Model {

	public function __construct()  {

    if (!isset($_SESSION['cart'])) {
      	$_SESSION['cart'] = new ShoppingCart();
 	  }

    $_SESSION['conn'] = connect_to_db("motley");

  }


  //public function  to clear Cart() (not unset)
  public function clearCart(){
    $_SESSION = Array();
  }


	public function updateCart($type, $quantity) {
        //for now hardcode in type
        //$type = "latte";
        //$quantity = 1;
        $displayName = ShoppingCart::$alltypes[$type];

        if ($displayName && is_numeric($quantity) && $quantity > 0) {
            $_SESSION["cart"]->updateCart($type, $quantity);
            //$_SESSION["cart"]->order($type, $quantity);
            $message = "$quantity boxes of $displayName added to shopping cart";
        }
        else if (!$displayName) {
            $message = "Invalid selection";
        }
        else if (!is_numeric($quantity)) {
           $message = "Invalid; quantity not numeric";
        }
        else if ($quantity < 1) {
            $message = "Invalid; quantity less than 1";
        }
	       	return $message;
 	}

 	public function getCart() {
 		return $_SESSION["cart"]->getOrder();
 	}

    public function getCustomer() {
        return $_SESSION["cart"]->getCustomer();
    }

    public function addCustomer($key, $value){
        $_SESSION['cart']->addCustomer($key, $value);
    }

    public function order($drink, $quantity){
        $_SESSION['cart']->order($drink, $quantity);
    }

 	public function addToCart($type, $quantity) {
        //something is being added to the model without knowing??
        if($quantity > 0){
            $currentQuantity = $this->order[$type];
            $currentQuantity += $quantity;
            $this->order[$type] = $currentQuantity;
        }
 	}

//   public function addCustomertoDb($name, $phone, $email, $carrier) {
//       $connection = $_SESSION['conn'];
//       include("model/queries.php");
//       mysqli_stmt_execute($selectCustomer);
//       print_r($connection->error);
//
//       $selectCustomer -> bind_result($customerId);
//       // Existing customer in database
//       if ($selectCustomer -> fetch() ) {
//         echo "<br />Thanks for shopping again customer $customerId!
//          <br />";
//       }
//       else {
//         // Add to DB if new customer
//         mysqli_stmt_execute($insertCustomer);
//         $customerId = mysqli_stmt_insert_id($insertCustomer);
//         print_r($connection->error);
//         echo "<br /><br />Thanks for being a new customer!
//         You are customer #$customerId. <br /><br />";
//       }
//       // end statements
//       mysqli_stmt_close($selectCustomer);
//       mysqli_stmt_close($insertCustomer);
// }

  // public function addDrinktoDb() {
  //   $connection = $_SESSION['conn'];
  //   include("model/queries.php");
  //   mysqli_stmt_execute($insertDrink);
  //   echo "<br /> start add drink <br />";
  //   print_r($connection->error);
  //   $orderid = mysqli_stmt_insert_id($insertDrink);
  //
  //   // foreach($drinkList as $n => $q) {
  //   //   $name = $n;
  //   //   $quantity = $q;
  //   // }
  //
  //   echo "<br /><br />ending add drink<br /><br />";
  //   mysqli_stmt_close($insertDrink);
  // }

// public function getCustId ($name, $email) {
//   $connection = $_SESSION['conn'];
//   include("model/queries.php");
//   mysqli_stmt_execute($selectCustomer);
//   print_r($connection->error);
//
//   $selectCustomer -> bind_result($customerId);
//
//   mysqli_stmt_close($selectCustomer);
//   return $customerId;
// }

// public function addOrdertoDb($customerId, $orderPrice, $date, $timedrop) {
//     $connection = $_SESSION['conn'];
//     include("model/queries.php");
//     mysqli_stmt_execute($insertOrder);
//     print_r($connection->error);
//     echo "<br /><br />---starting insertOrder query--- <br /><br />";
//     $insertOrder -> bind_result($orderid);
//     // Add to DB if new customer
//     $orderid = mysqli_stmt_insert_id($insertOrder);
//     print_r($connection->error);
//     echo "Thanks for shopping! This is order #$orderid. <br />";
//
//     // end statements
//     mysqli_stmt_close($insertCustomer);
//   }

  public function addAlltoDb($name1, $phone1, $email1, $carrier1,
        $date1, $timedrop1) {

        echo "heeloo?";
        $name = $name1;
        $phone = $phone1;
        $email = $email1;
        $carrier = $carrier1;
        $date = $date1;
        $timedrop = $timedrop1;
        $orderPrice = 15.00;
        //need to put all of the variables that are going to be inserted into the table in this function
        //

      //Add customer
      $connection = $_SESSION['conn'];
      include("model/queries.php");
      mysqli_stmt_execute($selectCustomer);
      print_r($connection->error);

      //customer needs: name, phone, email, carrier
      $selectCustomer -> bind_result($customerId);
      // Existing customer in database
      if ($selectCustomer -> fetch() ) {
        echo "<br />Thanks for shopping again customer $customerId!
         <br />";
      }
      else {
        // Add to DB if new customer
        mysqli_stmt_execute($insertCustomer);
        $customerId = mysqli_stmt_insert_id($insertCustomer);
        print_r($connection->error);
        echo "<br /><br />Thanks for being a new customer!
        You are customer number $customerId. <br /><br />";
      }

      //lets close the connections here:
        mysqli_stmt_close($selectCustomer);
        mysqli_stmt_close($insertCustomer);
        echo $customerId;
        
        //needs to be here, to calculate total order price so it can be
        //given to the order table
        $myCart = $this->getCart();
        $orderPrice = 0;
        foreach ($myCart as $drink => $q) {
            // $name = $drink;
            //$quantity = $q;
            // $drinkprice = priceOf($drinkname);
            $price = ShoppingCart::$alltypes[$drink];
            $orderPrice += $price;
            mysqli_stmt_execute($insertDrink);
          }

      //insert drink will have to go before the order..? or the other way around if we are to include the totalPrice
      //insert order needs: $orderid, $customerId, $orderPrice, $date, $timedrop
      mysqli_stmt_execute($insertOrder);
      $orderid = mysqli_stmt_insert_id($insertOrder);
      echo "order id is " . $orderid . "<br>";
      mysqli_stmt_close($insertOrder);

      //orderid doesnt work --- this is the key !!it's all about the order 
      //the variables need to be introcuced before the executes are called b/c they expect these variables with the correct names
          //insert $drinks : orderId, name, quantity, customerId, price
          echo print_r($myCart);
          foreach ($myCart as $drink => $q) {
            $name = $drink;
            $quantity = $q;
            $price = ShoppingCart::$alltypes[$name];
            echo "name: $name    quantity: $quantity   orderid: $orderid  customerid: $customerId   price: $price ";
            //$orderPrice += $price;
            mysqli_stmt_execute($insertDrink);
            print_r("error" . $connection->error);
          }
          // end statements
            mysqli_stmt_close($insertDrink);
          echo "drinks inserted ";

      
    

  }//end



}




?>
