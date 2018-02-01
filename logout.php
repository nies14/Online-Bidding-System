<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['username']);
unset($_SESSION['product']);
unset($_SESSION['cart']);
unset($_SESSION['page']);

if(count($_COOKIE) > 0) 
{
	setcookie("product", "", time() - 3600);
} 
session_destroy();
header("location:login.html");
?>