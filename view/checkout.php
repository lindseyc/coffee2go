<?php


require_once('model/cart.php');
session_start();

?>

<!DOCTYPE html>

<?php 

// //if session is starting then store an empty cart in it
// if(!isset($_SESSION['cart'])) {
// 	$_SESSION['cart'] = new ShoppingCart();
// }

// //if submit has been clicked then destroy session
// if(isset($_POST['order'])) { // has to receive from the controller
// 	unset($_SESSION);
// 	session_destroy();
// }

function createTimeDropDown() {
	$hours = $minutes = $ampm = $optString = '';
	$i = 0;
	for($i = 540; $i <= 1260; $i += 30){
		   $hours = floor($i / 60);
           $minutes = $i % 60;
           if ($minutes < 10){
               $minutes = '0' . $minutes; // adding leading zero
           }
           $ampm = $hours % 24 < 12 ? 'AM' : 'PM';
           $hours = $hours % 12;
           if ($hours === 0){
               $hours = 12;
           }
           $text =$hours.':'.$minutes.' '.$ampm;
           $optString .='<option value="'.$i.'">'.$text.'</option>';
	}
	return $optString;
}

?>
<html lang="en">

<head>
	<style> /*style for header and footer*/
		header, footer {
			padding: 1em;
    		
    		clear: left;
    		text-align: center;
        }
        button {
            box-shadow: 0 4px #999;
            padding:10px;
        }
        .motto {
            font-family: "Palatino", "Garamond", "Times", serif
        }
	</style>
	<link href="view/main.css" type="text/css" rel="stylesheet"/>
	<title> Checkout </title>
</head>

<body>
	<h2> Checkout </h2>

	<!-- Display order and customer info -->
	<fieldset>
	<legend> Your Information: </legend>
	<!-- customer info (can not edit, maybe in a later feature) -->
	<?php
	// iff post isset:
	print_r($_POST);
	$post = $_POST;
	print_r($post);
	unset($post['submit']);
	unset($post['dropdown']);
	foreach($post as $key => $value){
		echo "Your " . $key . " is " . $value;
		echo "<br>";
	}

	?>
	</fieldset>

	<fieldset>
	<legend> Your Order: </legend>
	<!-- table for drink order -->
	<?php
	echo '<table>';
	echo '<tr>';
		echo '<td>Drink</td>';
		echo '<td>Price</td>';
		echo '<td>Quantity</td>';
	foreach ($shoppingCart as $drink => $price) {
		echo '<tr>';
			echo '<td>';
			print_r($drink);
			echo '</td>';
			echo '<td>';
			print_r($price);
			echo '</td>';
			 echo '<td>';
			//put quantity box here? or just have confirm, & no 'update of order option'
			 echo '</td>';
		echo '</tr>';
	}
	echo "</table>";

	// pickup time selection?

	?>
	<h6>In how many minutes would you like your drink to be ready?</h6>
	<select id="timeDrop" name="timeDrop" default="in minutes">
                <option value="30">30</option>
                <option value="45">45</option>
                <option value="60">60</option>
                <option value="75">75</option>
                <option value="90">90</option>
                <option value="105">105</option>
                <option value="120">120</option>
     </select>

	</fieldset>

	<br>
	<button text-align="right" class="brown" name="confirm" type="confirm" value="confirm">Confirm</button>

</body>

</html>