<!DOCTYPE html>
<?php
$path = ('./model/carriersandaddresses.php');
require_once($path);
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
	<link href="main.css" type="text/css" rel="stylesheet"/>

    <!-- javascript validation -->
    <!-- <script scr="validate.js"></script> -->
    <script>
       var dropSelection = function() {
            var radiobutt = $('#dropdown').val();
            var update = $('#drinklist');
            if(radiobutt == "smoothie"){
                update.html('<p> smoothie was selected</p>');
                return true;
            } else if (radiobutt == "tea"){
                update.html('<p> tea was selected</p>');
                return true;
            } else if (radiobutt == "coffee"){
                update.html('<p> coffee was selected</p>');
                return true;
            } else {
                update.html('<p> none selected </p>');
                return false;
            }
        }

    $(document).ready(function() {
        // selectorder = $('#dropdown').val();
        $('#dropdown').on("change", dropSelection);
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

             <legend for="name">Name: <input type="text" id="email" name="name" placeholder="First and Last"></input>
            </legend>

            <legend for="email">Email: <input type="email" id="email" name="email" placeholder="@scrippscollege.edu"></input>
            </legend>
            <br/>        <!-- emailtextmessages.com -->

            <legend for="phone">Phone number: <input type="tel" id="phone" name="phone" placeholder="xxx xxx xxxx"></input>
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
                <option value="coffee">Coffee</option>
                <option value="tea">Tea</option>
                <option value="smoothie">Smoothies</option>

            </select>
            <p><span id="drinklist">Drinks will be inserted here</span>
            </p>
        </fieldset>

        <p></p>
        <!-- send the info to the controller to validate? if not, stay on page but if all good then  -->
        <!--  onclick="validateForm(orderfrm)" -->
        <button class="brown" name="submit" type="submit" value="submit">Go to cart</button>
        <!-- and invoke onclick -->
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
