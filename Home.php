<?php
	session_start();
	if($_SESSION["page"] =="admin")
	{
		header("location:AdminHome(h).php");
	}
	
	else if($_SESSION["page"] =="employee")
	{
		header("location:EmployeeHome(h).php");
	}
	
	else if($_SESSION["page"] =="customer")
	{
		header("location:CustomerHome(h).php");
	}

?>