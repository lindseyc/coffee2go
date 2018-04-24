<head>
<link href="view/main.css" type="text/css" rel="stylesheet"/>
</head>

<?php

include('controller/controller.php');


$controller = new Controller();
$controller->invoke();

?>