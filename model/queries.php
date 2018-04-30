<?php
// PDO statements
// Insert into employee
// $query = "INSERT INTO employee(id, name)
//           VALUES(?, ?);";
// $insertEmployee = $connection->prepare($query);
// $insertEmployee-> bind_param("is", $employeeId, $employeeName);

// Insert into customer
$query = "INSERT INTO customer(name, phone, email, carrier)
          VALUES( ?, ?, ?, ?)";
$insertCustomer = $connection->prepare($query);
$insertCustomer-> bind_param("siss", $name, $phone,
                              $email, $carrier);

// Select customer
$query = "SELECT id FROM customer WHERE name=?";
$selectCustomer = $connection->prepare($query);
$selectCustomer->bind_param("s", $name);

// Insert into order
// $query = "INSERT INTO orders(id, customer_id, price, dateCreated)
//           VALUES(?, ?, ?, now())";
// $insertOrder = $connection->prepare($query);
// $insertOrder-> bind_param("iidd", $orderid, $customerId, $orderPrice, $date);

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
