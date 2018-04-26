<?php
// PDO statements

// Insert into employee
$query = "INSERT INTO employee(name)
          VALUES(?);";
$insertEmployee = $connection->prepare($query);
$insertEmployee-> bind_param("s", $employeeName);

// Insert into customer
$query = "INSERT INTO customer(name, phone, email, carrier)
          VALUES(?, ?, ?, ?)";
$insertCustomer = $connection->prepare($query);
$insertCustomer-> bind_param("siss", $customerName, $phone, $email, $carrier);

// Insert into order
$query = "INSERT INTO orders(id, customer_id, price, dateCreated)
          VALUES(?, ?, ?, now())";
$insertOrder = $connection->prepare($query);
$insertOrder-> bind_param("iids", $orderid, $customerId, $orderPrice, $date);

// Select from drinktype
$query = "SELECT name from drinktype where id=?";
$selectdrinktype = $connection->prepare($query);
$selectdrinktype->bind_param('i', $drinktypeid);

?>
