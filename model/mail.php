<?php
$path = ('carriersandaddresses.php');
require_once($path);

// $phone_number = $_POST['phone'];
// $carrier = $_POST['carrier'];
// $pickup_time = $_POST['timeDrop'];

class mail {
    public function sendMail ($email, $phone_number, $carrier, $email_text_orboth, $time){
        $carrier_url = CellCarriers::$carriers[$carrier]; 
        $headers = "From: noreply@scrippscollege.edu\r\n".
        "Reply-To: noreply\r\n'" .
        "X-Mailer: PHP/" . phpversion();
        $email_subject="Order confirmation";
        $email_message="Your order is confirmed. It will be ready for pickup in " . $time . ' minutes.';

        if ($email_text_orboth == 'phone' || $email_text_orboth == 'both'){
            $email_to= $phone_number . "@" . $carrier_url;
            mail($email_to, $email_subject, $email_message, $headers);  
            echo "\nText message sent!";
        };
        if ($email_text_orboth == 'email' || $email_text_orboth == 'both'){
            $email_to= $email;
            mail($email_to, $email_subject, $email_message, $headers);  
            echo "\nEmail message sent!";
        }
        // else: if none, don't send anything
    }
}
?>