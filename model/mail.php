<?php
$email_to="address@gmail.com";
$email_subject="It works";
$email_message="Hello. I can send mail!";
$headers = "From: Me\r\n".
"Reply-To: address@gmail.com\r\n'" .
"X-Mailer: PHP/" . phpversion();
mail($email_to, $email_subject, $email_message, $headers);  
echo "mail sent!"
?>