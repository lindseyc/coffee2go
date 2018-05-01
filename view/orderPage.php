<!DOCTYPE html>
<?php
$path = ('./model/carriersandaddresses.php');
require_once($path);
include_once('./model/cart.php');
?>
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
	<title> Start an order </title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- style sheet CSS -->
	<link href="./view/main.css" type="text/css" rel="stylesheet"/>

    <!-- javascript validation -->

    <script src="./view/validate.js"></script>

    <script>
    $(document).ready(function() {
        $('#dropdown').on("change", function() {
            var radiobutt = $('#dropdown').val();
            var drinks = ['coffee', 'tea', 'smoothie']
            for (var i = 0; i < drinks.length; i++){
                var current = "." + drinks[i]
                if (drinks[i] == radiobutt || radiobutt == 'all'){
                    $(current).show();
                }
                else {
                    $(current).hide();
                }
            }
        });
    });
    </script>
</head>

<body>
    <h1>Order some coffee!</h1>
    <!-- put the controller in the action? -->
    <form name="orderfrm" id="order" method="post">
        <fieldset>
            <legend>Customer information</legend>

             <legend for="name">Name: <input type="text" id="name" name="name" placeholder="First and Last"></input>
            <span></span>
            </legend>

            <legend for="email">Email: <input type="email" id="email" name="email" placeholder="@scrippscollege.edu"></input>
            <span></span>
            </legend>
            <br/>        <!-- emailtextmessages.com -->

            <legend for="phone">Phone number: <input type="tel" id="phone" name="phone" placeholder="xxxyyyzzzz"></input>
            <span></span>
            </legend>

            <legend for="carrier">Carrier: 
            <select id="carrier" name="carrier">
            <?php
                foreach (CellCarriers::$carriers as $carrier => $value){
                    echo "<option value=\"" . $carrier . "\">" . $carrier;
                    echo "</option>";
                };
            ?>
            </select></legend>

        </fieldset>
        <fieldset>

            <legend for="dropdown">Order</legend>
            <select id="dropdown" name="dropdown">
                <option value="all">All</option>
                <option value="coffee">Coffee</option>
                <option value="tea">Tea</option>
                <option value="smoothie">Smoothie</option>

            </select>
            <!-- add some space -->
            <br/><br/> 

            <table id="table">
                <thead>
                    <tr>
                        <th>Drink Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- hardcoded drinks array of coffee into orderpage with add to cart button: -->
                <?php
                echo "the menu: ";
                $totalPrice = 0;
                $merged = Array ('coffee' => ShoppingCart::$drinktypes,
                'tea' => ShoppingCart::$teatypes,
                'smoothie' => ShoppingCart::$smoovtypes);
                print_r($merged);
                foreach ($merged as $drinkclass => $drinks){
                    foreach($drinks as $type => $price){
                        $totalPrice += $price;
                        echo "<tr class='$drinkclass'>";
                            echo "<td>";
                            echo($type);
                            echo "</td><td>";
                            //price
                            echo "$" . number_format($price, '2');
                            echo "</td><td>";
                            echo "Add to Cart:
                                <input type='number' class='drink $drinkclass' value='0' id='quantity' name='$type' min='0' max='5'>";

                            echo "</td>";
                        echo "</tr>";
                    }
                }
                 ?>
                </tbody>
            </table>
        </fieldset>

        <p></p>
        <!-- send the info to the controller to validate? if not, stay on page but if all good then  -->
        <!--  onclick="validateForm(orderfrm)" -->
        <button id='submit' class="brown" name="submit" type="submit" value="submit">Go to cart</button>
        <span id="submiterror" style="color:red; display:none;">
            Error. Please make sure all elements are filled out correctly.
          </span>
        <span id="quantityerror" style="color:red; display:none;">
        Drink order cannot be zero; no bulk orders.
        </span>
    </form>
    <p>Thank you for your order!</p>

    <footer>
        <hr/>
        <p class='motto' style="font-weight:bold;">The Motley Coffeehouse</p>
        <p class="motto"> - an intersectional, political, and feminist coffeehouse run by the students of Scripps College - </p>
        <p>345 E. 9th Street <br/> Scripps College <br/> Claremont, CA 91711</p>
        <p>(909) 607-3967 </p>
    </footer>
</body>

</html>
