# Coffee2go
## Vision

This project envisions a online order form for the Motley Coffeehouse, Scripps College.

## Files
The files are structured in model-view-controller style, where the controller accesses various pages, the model makes server requests or other back-end functions, and the view stores the display pages for the end users.

### Pages in 'view'
* `orderPage.php` displays a form where the user may initially select their order. Each page is displayed based on drink type. `validate.js` accompanies this page.
* `checkout.php` displays the user's order as an order confirmation page.
* `confirmation.php` is a page that simply confirms the order.
* `submittedOrders.php` allows an employee of the Motley Coffeehouse to display orders that are pending, and cancel them or mark them as complete.

### Pages as 'model'
* `carriersandaddresses.php` contains a hard-coded list of carriers and email addresses for emailing confirmation messages to users.
* `mail.php` receives a POST array with a carrier and a phone number, to email a confirmation text message.
* `initialize.csv` stores the drinks before being entered in the SQL database.
* `queries.php` runs the SQL queries.
* `db.sql` stores the SQL queries themselves, used to interact directly with the SQL database, primarily when creating the database if not already created.
* `cart.php` works with the customer's ordering process to add, remove, or modify drinks, or to submit them, display drink prices, etc. in conjunction with the view.

### The 'controller'
* `controller.php` executes communication between the view and model by tracking what is submitted through the post by the user and using information from the model to display the view pages

### Miscellaneous
* The ER diagram is also presented.
* `dbconn.php` connects to the database.
* `index.php` is the main page.

## Other information
This project was created as a class project for CS135 at Claremont Mckenna College by LC, BK, and JB.
How to run on your machine: You must start mysql.exe and also be running the MAMP servers for this code to load and function. Mail must be enabled through smtp on your device (different depending on Mac or Windows). 
