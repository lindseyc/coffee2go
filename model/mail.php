<?php
$path = ('carriersandaddresses.php');
require_once($path);

$phone_number = $_POST['phone']; // This should be a  POST somehow
$carrier = $_POST['carrier'];
// $carrier = 'T-Mobile'; // only for hard-coding
$carrier_url = CellCarriers::$carriers[$carrier]; // post needs fixing but yeah
// echo $carrier_url; // $_POST['carrier'];

$email_to= $phone_number . "@" . $carrier_url;
// echo "\n" . $email_to;
$pickup_time = $_POST['timeDrop'];
$email_subject="Order confirmation";
$email_message="Your order is confirmed. It will be ready for pickup \
in " . $pickup_time . 'minutes.';
$headers = "From: noreply@scrippscollege.edu\r\n".
"Reply-To: noreply\r\n'" .
"X-Mailer: PHP/" . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
echo "\nText message sent!"
?>