# Coffee2go
## Vision

This project envisions a online order form for the Motley Coffeehouse, Scripps College.

## Files
The files are structured in model-view-controller style, where the controller accesses various pages, the model makes server requests or other back-end functions, and the view stores the display pages for the end users.

### Pages in 'view'
* `checkout.php` displays the user's order as an order confirmation page.
* `orderPage.php` displays a form where the user may initially select their order. Each page is displayed based on drink type. `validate.js` accompanies this page.
* `submittedOrders.php` allows an employee of the Motley Coffeehouse to display orders that are pending, and cancel them or mark them as complete.

### Pages as 'model'
* `carriersandaddresses.php` contains a hard-coded list of carriers and email addresses for emailing confirmation messages to users.
* `initialize.csv` stores the drinks before being entered in the SQL database.
* `queries.php` runs the SQL queries.
* `db.sql` stores the SQL queries themselves, used to interact directly with the SQL database, primarily when creating the database if not already created.
* `cart.php` works with the customer's ordering process to add, remove, or modify drinks, or to submit them, display drink prices, etc. in conjunction with the view.

### The 'controller'
* `contoller.php` executes communication between the view and model by tracking what is submitted through the post by the user and using information from the model to display the view pages

## Other information
This project was created as a class project for CS135 at Claremont Mckenna College by LC, BK, and JB.