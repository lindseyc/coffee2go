<?php
// PDO statements

// Insert into employee
$query = "INSERT INTO employee(name)
          VALUES(?);";
$insertEmployee = $connection->prepare($query);
$insertEmployee-> bind_param("s", $name);

// Insert into customer
$query = "INSERT INTO customer(name, phone, email, carrier)
          VALUES(?, ?, ?, ?);";
$insertCustomer = $connection-prepare($query);
$insertCustomer-> bind_param("ssss");

// Insert into order
$query = "INSERT INTO orders(customer_id, price, dateCreated)
          VALUES(?, ?, now());";
$insertOrder = $connection-prepare($query);
$insertOrder-> bind_param("ifs");

// Insert into customdrink
$query = "INSERT INTO CustomDrink(order_id, type_id, quantity, price)
          VALUES(?, ?, ?, ?);";
$insertCustomDrink = $connection-prepare($query);
$insertCustomDrink-> bind_param("iiif");

// Select from drinktype
$query = "SELECT name from drinktype where id=?";
$selectdrinktype = $connection->prepare($query);
$selectdrinktype->bind_param('i', $drinktypeid);

?>
