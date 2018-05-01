<?php


require_once('./model/cart.php');
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

    <!-- javascript validation -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/
		jquery.min.js"></script>
    <script src="./view/validate.js"></script>
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

	//$post = $_POST;
	//unset($post['submit']);
	//unset($post['dropdown']);
	//print_r($_SESSION['cart']);
	$postCust = $_SESSION['cart']->getCustomer();
	$postOrder = $_SESSION['cart']->getOrder();
	//print_r($postCust);
	//print_r($postOrder);
	foreach($postCust as $key => $value){
		//all info is in the post, so need to break before it reaches
		//the drinks and quantities
		if($key == "carrier"){
			echo "Your carrier is: ";
			echo "<select class=\"carrier\" name=\"carrier\" value='$value'>";
            foreach (CellCarriers::$carriers as $carrier => $v){
					echo "<option value='$carrier'";
					if ($carrier == $value){
						echo "selected='selected'";
					}
					echo "> $carrier </option>";
                };
            echo '</select>';
			break;
		}
		echo "Your $key is: <input class='$key' name ='$key' value='$value' placeholder='$value'></input><span></span>";
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
		//I DONT KNOW WHAT THESE ARE / where they came from??
		//unset($shoppingCart['all']);
		//unset($shoppingCart['']);
		//print_r($post);
		//print_r($shoppingCart);
		$totalPrice =  0;
		$totalQuantity = 0;
	foreach ($postOrder as $drink => $quantity) {
		if($quantity > 0){
			echo '<tr>';
				echo '<td>';
				//echo ShoppingCart::$displaynames[$drink];
				echo $drink;
				echo '</td>';
				echo '<td>';
				//price
				//need to get from $displaynames b/c irish bfast is irish_bfast in post array
				//$price = ShoppingCart::$alltypes[ShoppingCart::$displaynames[$drink]];
				$price = ShoppingCart::$alltypes[$drink];
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

	<br>

	<legend>Confirmation</legend>
	<p>
		Have my drink ready in:
		<select id="timeDrop" name="timeDrop">
			<option value="30">30</option>
			<option value="45">45</option>
			<option value="60">60</option>
			<option value="75">75</option>
			<option value="90">90</option>
			<option value="105">105</option>
			<option value="120">120</option>
		</select> minutes.
	</p>

	<p>
		Receive confirmation by: <select name="confirmtype">
			<option value="email">Email</option>
			<option value="text">Text</option>
			<option value="both">Both</option>
			<option value="none">None</option>
		</select>
	</p>

	<!-- timestamp -->
	<input type="hidden" name="timestamp" value="<?php date_default_timezone_set('America/Los_Angeles');  echo date(DATE_RFC2822); ?>"/>
	
	<input type="hidden" name="confirm"/>

	</fieldset>
	<button id="submit" class="brown" name="confirm" type="confirm" value="confirm">Confirm</button>
	</form>

</body>

</html>
