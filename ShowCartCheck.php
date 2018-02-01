<?php
session_start();
$myJSON = json_encode($_SESSION["cart"]);
echo $myJSON;

?>