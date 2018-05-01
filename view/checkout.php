<?php


require_once('model/cart.php');
session_start();

?>

<!DOCTYPE html>


<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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



 	<form name="confirmation" id="confirmation" method="post">

 	<!-- Display order and customer info -->
	<fieldset>
	<legend> Your Information: </legend>
	<!-- customer info (can not edit, maybe in a later feature) -->
	<?php
	// iff post isset:
	//print_r($_POST);
	$post = $_POST;

	unset($post['submit']);
	unset($post['dropdown']);
	//print_r($post);

	foreach($post as $key => $value){
		echo "Your " . $key . " is " . $value;
		echo "<br>";
		//all info is in the post, so need to break before it reaches
		//the drinks and quantities
		if($key == "carrier"){
			break;
		}
	}

	?>
	</fieldset>

	<fieldset>
	<legend> Your Order: </legend>
	<!-- table for drink order -->
	<?php
	unset($post['name']);
	unset($post['email']);
	unset($post['phone']);
	unset($post['carrier']);

	echo '<table>';
	echo '<tr>';
		echo '<td>Drink</td>';
		echo '<td>Price</td>';
		echo '<td>Quantity</td>';
		//I DONT KNOW WHAT THESE ARE / where they came from??
		//unset($shoppingCart['all']);
		//unset($shoppingCart['']);
		//print_r($post);
		//print_r($shoppingCart);
		$totalPrice =  0;
		$totalQuantity = 0;
	foreach ($post as $drink => $quantity) {
		if($quantity > 0){
			echo '<tr>';
				echo '<td>';
				echo ShoppingCart::$displaynames[$drink];
				echo '</td>';
				echo '<td>';
				//price
				//need to get from $displaynames b/c irish bfast is irish_bfast in post array
				$price = ShoppingCart::$alltypes[ShoppingCart::$displaynames[$drink]];
				$price =  $quantity * $price;

				echo '$' . number_format($price, '2', '.', ',');
				$totalPrice += $price;
				echo '</td>';
				echo '<td>';
				echo $quantity;
				$totalQuantity += $quantity;
				//put quantity box here? or just have confirm, & no 'update of order option'
				echo '</td>';
			echo '</tr>';
		}
	}
	echo "</table>";
	echo "Your total is $" . number_format($totalPrice, '2', '.', ',') . " for $totalQuantity drink(s)";

	// pickup time selection
	?>
	</fieldset>
	<fieldset>
	<legend>In how many minutes would you like your drink to be ready?</legend>
	<select id="timeDrop" name="timeDrop">
                <option value="30">30</option>
                <option value="45">45</option>
                <option value="60">60</option>
                <option value="75">75</option>
                <option value="90">90</option>
                <option value="105">105</option>
                <option value="120">120</option>
     </select>


	<br>
	<!-- timestamp -->
	<input type="hidden" name="timestamp" value="<?php date_default_timezone_set('America/Los_Angeles');  echo date(DATE_RFC2822); ?>"/>
	<!-- naming of the $_POST as "confirm"  -->
	<input type="hidden" name="confirm"/>
	<button text-align="right" class="brown" name="confirm" type="confirm" value="confirm">Confirm</button>
	</form>
	</fieldset>
</body>

</html>
