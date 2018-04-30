<!DOCTYPE html>
<?php
$path = ('./model/carriersandaddresses.php');
require_once($path);
include_once('./model/cart.php');
?>
<html>
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
	<title> Start an order </title>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- style sheet CSS -->
	<link href="./view/main.css" type="text/css" rel="stylesheet"/>

    <!-- javascript validation -->
    <script scr="./view/validate.js"></script>

<!-- <?php
    // $smoothies = ShoppingCart::$smoovtypes;

    // $cart_info_json = json_encode($smoothies);
    // $tea = ShoppingCart::$teatypes;
    // $cart_info_json = json_encode($smoothies);

    // $coffee = ShoppingCart::$drinktypes;
    // $cart_info_json = json_encode($smoothies);

?> -->

    <script>

function printTable(display) {
    var table = document.getElementById("table");
    var i = 1;
    for(var k in display){
        var tr = document.createElement("tr");
        var td = document.createElement("td");
        var txt = document.createTextNode(k);
        var td2 = document.createElement("td");
        var txt2 = document.createTextNode(display[k]);

        td.appendChild(txt);
        td2.appendChild(txt2);
        tr.appendChild(td);
        tr.appendChild(td2);
        table.appendChild(tr);
        }


}



    $(document).ready(function() {
        $('#dropdown').on("change", function() {
            var radiobutt = $('#dropdown').val();
            var drinks = ['coffee', 'tea', 'smoothie']
            if (radiobutt == 'all'){
                update.html('<p> all were selected</p>');
            }
            else {
                for (var i = 0; i < drinks.length; i++){
                    var current = "." + drinks[i]
                    if (drinks[i] == radiobutt){
                        $(current).show();
                    }
                    else {
                        $(current).hide();
                    }
                }
                update.html('<p>' + radiobutt + ' was selected</p>')
            }
            printTable(toDisplay);
        });
    });
    </script>
</head>

<body>
    <h1>Order some coffee!</h1>
    <!-- put the controller in the action? -->
    <form name="orderfrm" id="order" method="post">
    <!-- redirect to the controller, which will redirect to the right view
    make sure form -->

        <fieldset>
            <legend>Customer information</legend>
             <legend for="name">Name: <input type="text" id="email"
							 name="name" placeholder="First and Last"></input>
            </legend>

            <legend for="email">Email: <input type="email" id="email"
							name="email" placeholder="@scrippscollege.edu"></input>
            </legend>
            <br/>        <!-- emailtextmessages.com -->

            <legend for="phone">Phone number: <input type="tel" id="phone"
							name="phone" placeholder="xxx xxx xxxx"></input>
            </legend>

            <legend for="carrier">Carrier:
            <select id="carrier" name="carrier">
            <?php
                foreach (CellCarriers::$carriers as $carrier => $value){
                    echo "<option value=\"" . $carrier . "\">" . $carrier;
                    echo "</option>";
                };
            ?>
            </select>
					</legend>
        </fieldset>
        <fieldset>

            <legend for="dropdown">Order</legend>
            <select id="dropdown" name="dropdown">
                <option id="all" value="all">All</option>
                <option id="2" value="coffee">Coffee</option>
                <option id="1" value="tea">Tea</option>
                <option id="0" value="smoothie">Smoothie</option>

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
                            echo "</td>";
                            echo "<td>";
                            //price
                            echo "$" . number_format($price, '2');
                            echo "</td>";
                            echo "<td>";
                            echo "Add to Cart:
                                <input type='number' class='" . $drinkclass . "' value='0' id='quantity' name='$type' min='0' max='5'>";

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
        <button class="brown" name="submit" type="submit" value="submit">Go to cart</button>
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
