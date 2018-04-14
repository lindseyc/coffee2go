<?php
// PDO statements

$query




// Insert into girlscout
$query = "INSERT INTO girlscout (gsname, troop)
          VALUES(?, ?)";
$insertGirlscout = $connection->prepare($query);
$insertGirlscout-> bind_param("ss", $gsname, $troop);

// Select from girlscout
$query = "SELECT gs_id from girlscout where gsname=?";
$selectGirlscout = $connection->prepare($query);
$selectGirlscout->bind_param('s', $gsname);


?>
