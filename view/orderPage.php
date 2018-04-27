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

<?php
    $smoothies = ShoppingCart::$smoovtypes;

    $cart_info_json = json_encode($smoothies);
    $tea = ShoppingCart::$teatypes;
    $cart_info_json = json_encode($smoothies);

    $coffee = ShoppingCart::$drinktypes;
    $cart_info_json = json_encode($smoothies);

?>

    <script>


        var dropSelection = function() {

            var radiobutt = $('#dropdown').val();
            var update = $('#drinklist');
            if(radiobutt == "smoothie"){
                update.html('<p> smoothie was selected</p>');
                // <?php
                //     echo ShoppingCart::$smoovtypes;
                //  ?>
                <?php
                echo 'var smoove = JSON.parse("<?= $cart_info_json; ?>");'
                ?>
                update.html(smoove);

                return true;
            } else if (radiobutt == "tea"){
                update.html('<p> tea was selected</p>');
                // <?php
                // echo ShoppingCart::$teatypes;
                // ?>
                <?php
                echo 'var smoove = JSON.parse("<?= $cart_info_json; ?>");'
                ?>                update.html(smoove);
                return true;
            } else if (radiobutt == "coffee"){
                update.html('<p> coffee was selected</p>');
                // <?php
                // echo ShoppingCart::$drinktypes;
                // ?>
                <?php
                echo 'var smoove = JSON.parse("<?= $cart_info_json; ?>");'
                ?>
                update.html(smoove);

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
    </script> -->

		<!-- <script>
			 var dropSelection = function() {
						var radiobutt = $('#dropdown').val();
						var update = $('#drinklist');
						console.log(update);
						console.log(radiobutt);
						if(radiobutt == "smoothie"){
						} else if (radiobutt == "tea"){
						} else if (radiobutt == "coffee"){
							<?php
							// $drinktypeid = 1;
							// mysqli_stmt_execute($selectdrinktype);

							//$selectdrinktype->fetch();
							//$selectdrinktype->bind_result($name);
							//mysqli_stmt_close($selectdrinktype);

						?>
						} else {
						}
				}

		$(document).ready(function() {
				// selectorder = $('#dropdown').val();
				$('#dropdown').on("change", dropSelection);
				});
		</script> -->



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
            <select id="dropdown">
								<option value="" selected disabled hidden>Choose here</option>
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
                    foreach(ShoppingCart::$drinktypes as $type => $price){
                        echo '<tr>';
                            echo '<td>';
                            echo($type);
                            echo '</td>';
                            echo '<td>';
                            //price
                            echo '$' . number_format($price, '2');
                            echo '</td>';
                            echo '<td>';
                            echo 'Add to Cart:
                                <input type="number" placeholder="0" min="0" max="5">';
                            echo '</td>';
                        echo '</tr>';
                    }
                 ?>
                </tbody>
            </table>
<!--             <p><span id="drinklist">Drinks will be inserted here</span>
 -->

            </p>
        </fieldset>

        <p></p>
        <!-- send the info to the controller to validate? if not, stay on page but if all good then  -->
        <!--  onclick="validateForm(orderfrm)" -->
        <button class="brown" name="submit" type="submit" value="submit"onclick='return validateForm(orderfrm);'>Go to cart</button>
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
