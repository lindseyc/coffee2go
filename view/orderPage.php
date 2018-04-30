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
<<<<<<< Updated upstream
	<link href="main.css" type="text/css" rel="stylesheet"/>
=======

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



    // $(document).ready(function() {
    //     $('#dropdown').on("click", function() {
    //         var radiobutt = $('#dropdown').val();
    //         console.log(radiobutt);
            
    //         var toDisplay;
    //         <?php
    //             $all = array_merge(ShoppingCart::$drinktypes,
    //                                     ShoppingCart::$teatypes,
    //                                     ShoppingCart::$smoovtypes);
    //             $jsall = json_encode($all);

    //             echo 'var javascript_all = ' . $jsall . ';';

    //             $phpcoffee = ShoppingCart::$drinktypes;
    //             $jscoffee = json_encode($phpcoffee);
             
    //           echo 'var javascript_coffee = ' . $jscoffee . ';';

    //           $phptea = ShoppingCart::$teatypes;
    //             $jstea = json_encode($phptea);
             
    //           echo 'var javascript_tea = ' . $jstea . ';';

    //           $phpsmoov = ShoppingCart::$smoovtypes;
    //             $jssmoove = json_encode($phpsmoov);
             
    //           echo 'var javascript_smoov = ' . $jssmoove . ';'; 
    //         ?>



    //         var update = $('#drinklist');
    //         if(radiobutt == "smoothie"){
    //             update.html('<p> smoothie was selected</p>');
    //             toDisplay = javascript_smoov;


    //         } else if (radiobutt == "tea"){
    //             update.html('<p> tea was selected</p>');
    //             toDisplay = javascript_tea;
                
    //         } else if (radiobutt == "coffee"){
    //             update.html('<p> coffee was selected</p>');
    //             toDisplay = javascript_coffee;
                
    //          } else if (radiobutt == "all"){
    //             update.html('<p> all were selected</p>');

    //             toDisplay = javascript_all;
    //             console.log('in the last if else');

    //          }
    //           else {
    //             update.html('<p> none selected </p>');
    //         }
    //         printTable(toDisplay);
    //     });
    // });


    // $('#dropdown').change(function() {
    //     $
    // })
    </script>
>>>>>>> Stashed changes
</head>

<body>
    <h1>Order some coffee!</h1>
    <form id="order">
        <fieldset>
            <legend>Customer information</legend>
            Name: <input type="text" placeholder="First and Last"></input>
            Email: <input type="email" placeholder="@scrippscollege.edu"></input>
            <br/>
            Phone number: <input type="phone" placeholder="(909) 555-5555"></input>
            Carrier: <input type="text" placeholder="to receive texts"></input>
        </fieldset>
        <fieldset>
            <legend>Drink</legend>

<<<<<<< Updated upstream
=======
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
                $toDisplay = array_merge(ShoppingCart::$drinktypes,
                                        ShoppingCart::$teatypes,
                                        ShoppingCart::$smoovtypes);
                print_r($toDisplay);
                $totalPrice = 0;
                    foreach($toDisplay as $type => $price){
                        $totalPrice += $price;
                        if (in_array($type, ShoppingCart::$drinktypes)){
                            $drinkclass = "coffee";
                        }
                        else if (in_array($type, ShoppingCart::$teatypes)){
                            $drinkclass = "tea";
                        }
                        else if (in_array($type, ShoppingCart::$smoovtypes)){
                            $drinkclass = "smoothie";
                        }
                        else {
                            echo $type;
                        }
                        echo "<tr>";
                            echo "<td>";
                            echo($type);
                            echo "</td>";
                            echo "<td>";
                            //price
                            echo "$" . number_format($price, '2');
                            echo "</td>";
                            echo "<td>";
                            echo "Add to Cart:
                                <input type='number' class='" . $drinkclass . "' value='0' id='quantity' name='$type' placeholder='0' min='0' max='5'>";
                            echo "</td>";
                        echo "</tr>";
                    }
                 ?>
                </tbody>
            </table>
             <p><span id="drinklist">Drinks will be inserted here</span>
 

            </p>
>>>>>>> Stashed changes
        </fieldset>
        <p></p>
        <button class="brown" type="submit" value="submit">Order!</button>
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