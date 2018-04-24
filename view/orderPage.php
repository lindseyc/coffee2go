<!DOCTYPE html>

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
    <!-- style sheet CSS -->
	<link href="view/main.css" type="text/css" rel="stylesheet"/>
    
    <!-- javascript validation -->
    <!-- <script scr="validate.js"></script> -->

</head>

<body>
    <h1>Order some coffee!</h1>
    <!-- put the controller in the action? -->
    <form name="orderfrm" id="order" method="post"> 
    <!-- redirect to the controller, which will redirect to the right view 
    make sure form -->

        <fieldset>

            <legend>Customer information</legend>


           <legend>Order</legend>
             <legend for="name">Name: <input type="text" id="name" placeholder="First and Last"></input>
            </legend>

            <legend for="email">Email: <input type="email" id="email" placeholder="@scrippscollege.edu"></input>
            </legend>
            <br/>

            <legend for="phone">Phone number: <input type="tel" id="phone" placeholder="xxx xxx xxxx"></input>
            </legend>

            <legend for="carrier">Carrier: <input type="text" id="carrier" placeholder="to receive texts"></input>
            </legend>

        </fieldset>
        <fieldset>
           
            <select>
                <option value="coffee">Coffee</option>
                <option value="tea">Tea</option>
                <option value="smoothie">Smoothie</option>
            </select>
            <p><span id="drinklist">Drinks will be inserted here</span></p>
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