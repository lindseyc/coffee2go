<head>
<link href="view/main.css" type="text/css" rel="stylesheet"/>
</head>

<?php

include('controller/controller.php');

//instantiate a new controller and call its methods
$controller = new Controller();
$controller->invoke();
$controller->confirm();

?>
