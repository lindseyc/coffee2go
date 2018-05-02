<?php
// PDO statements

// Insert into employee
// $query = "INSERT INTO employee(id, name)
//           VALUES(?, ?);";
// $insertEmployee = $connection->prepare($query);
// $insertEmployee-> bind_param("is", $employeeId, $employeeName);

// Insert into customer
$query = "INSERT INTO customer(name, phone, email, carrier)
          VALUES(?, ?, ?, ?)";
$insertCustomer = $connection->prepare($query);
if (!$insertCustomer) {
  print_r($connection->error);
}else {
$insertCustomer-> bind_param("siss", $name, $phone,
                              $email, $carrier);}

// Select customer
$query = "SELECT id FROM customer WHERE name=? AND email=?";
$selectCustomer = $connection->prepare($query);
if (!$selectCustomer) {
  print_r($connection->error);
}
else {
  $selectCustomer->bind_param("ss", $name, $email);
}

// Insert into order  //do we have an orderId to insert

$query = "INSERT INTO orders(id, customer_id, price, dateCreated, timedrop)
          VALUES(?, ?, ?, now(), ?)";
$insertOrder = $connection->prepare($query);
if (!$insertOrder) {
  print_r($connection->error);
}
$insertOrder-> bind_param("iidi", $orderid, $customerId,
            $orderPrice, $timedrop);
// echo "order id is " . $orderid;
// echo "order price is " . $orderPrice;
// Insert into drinks
$query = "INSERT INTO drinks(orderId, name, quantity, customerId, price)
          VALUES (?, ?, ?, ?, ?)";
$insertDrink = $connection->prepare($query);
if (!$insertDrink) {
  print_r($connection->error);
}
// echo "cid is " . $customerId;
$insertDrink-> bind_param("isiid", $orderid, $name,
                    $quantity, $customerId, $price);


// Select from drinktype
// $query = "SELECT name FROM drinktype WHERE id=?";
// $selectdrinktype = $connection->prepare($query);
// $selectdrinktype->bind_param('i', $drinktypeid);

// Insert into customdrink
// $query = "INSERT INTO customdrink(id, order_id, type_id, quantity, price)
//           VALUES(?, ?, ?, ?, ?)";
// $insertCustomDrink = $connection->prepare($query);
// $insertCustomDrink->bind_param("iiiid", $customDrinkId, $orderid, $drinktypeid,
//                                 $quantity, $price);

// echo "<br /><br />queries pass<br /><br />";

?>
