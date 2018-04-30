<?php
session_start();

require "queries.php";

// Set database variables
// name = $_POST['name'];
// $phone = $_POST['phone'];
// $email = $_POST['email'];
// $carrier = $_POST['carrier'];

//////////
//Add info to database
//////////

// Customer information:
  // mysqli_stmt_execute($selectCustomer);
  // $selectCustomer -> bind_result($customer_id);
  // // Existing customer in database
  // if ($selectCustomer -> fetch() ) {
  //   echo "Thanks for shopping again customer $customer_id! <br />";
  // }
  // else {
  //   // Add to DB if new customer
  //   mysqli_stmt_execute($insertCustomer);
  //   $customerId = mysqli_stmt_insert_id($insertCustomer);
  //   echo "Thanks for being a new customer!
  //   You are customer #$customer_id. <br />";
  // }
  // // end statements
  // mysqli_stmt_close($selectCustomer);
  // mysqli_stmt_close($insertCustomer);

  // // Girlscout info
  // mysqli_stmt_execute($selectGirlscout);
  //   $selectGirlscout->bind_result($gs_id);
  //   if(!$selectGirlscout->fetch()){
  //     //Add new girl scout to db
  //     mysqli_stmt_execute($insertGirlscout);
  //     $gs_id = mysqli_stmt_insert_id($insertGirlscout);
  //   }
  //   // end statements
  //   mysqli_stmt_close($insertGirlscout);
  //   mysqli_stmt_close($selectGirlscout);

//   // Order information
//     mysqli_stmt_execute($insertOrder);
//     $price = 5;
//     $order_id = mysqli_stmt_insert_id($insertOrder);
//     echo "For reference, this is order # $order_id. <br />";
//
//     // Loop through cookies to add to db
//     foreach($_SESSION["cart"]->order as $variety => $quantity){
//       mysqli_stmt_execute($insertCookie);
//       $cookie_id = mysqli_stmt_insert_id($insertCookie);
// }
//       // end statements
//       mysqli_stmt_close($insertCookie);
//       mysqli_stmt_close($insertOrder);

 ?>
