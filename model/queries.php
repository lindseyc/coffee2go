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

// Insert into order
$query = "INSERT INTO orders(id, customer_id, price, dateCreated, timedrop)
          VALUES(?, ?, ?, ?, ?)";
$insertOrder = $connection->prepare($query);
if (!$insertOrder) {
  print_r($connection->error);
}
$insertOrder-> bind_param("iiddi", $orderid, $customerId,
            $orderPrice, $date, $timedrop);


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

echo "queries pass<br />";

?>
