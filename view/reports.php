<?php

// Show most popular drinks

// Show drinks ordered within 30 minutes
$query = "SELECT customer.name AS Name, drinks.name AS Drink, drinks.price AS Price FROM drinks
JOIN orders ON orders.id = drinks.orderId
JOIN customer ON customer.id = drinks.customerId
WHERE dateCreated >= DATE_ADD(CURRENT_TIMESTAMP, INTERVAL -30 MINUTE)";






?>
