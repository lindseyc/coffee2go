<?php

?>
<?php
    $a = a;
?>

<html>
<head>
	<style> /*style for header and footer*/
		header, footer {
			padding: 1em;
    		color: white;
    		
    		clear: left;
    		text-align: center;
        }
        button {
            box-shadow: 0 4px #999;
        }
	</style>
	<title> Start an order </title>
	<link href="home.css" type="text/css" rel="stylesheet"/>
</head>

<body>
    <h1>Order some coffee</h1>
    <form id="order">
        <fieldset>
            <legend>Customer information</legend>
            Name: <input type="text" placeholder="First and Last"></input>
        </fieldset>
        <fieldset>
            <legend>Drink</legend>
        </fieldset>
        <p></p>
        <button class="brown" type="submit" value="submit">Order!</button>
    </form>
    <p>Thank you for your order!</p>
</body>

</html>