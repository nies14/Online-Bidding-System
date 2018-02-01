<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	else
	{
		//print_r($_SESSION);
		//echo $_SESSION["username"];
		
		//echo "fdojfd";
		
		$conn = mysqli_connect("localhost", "root", "","mydb");

		foreach($_SESSION["cart"] as $keys => $values)
		{
			$sql="INSERT INTO order_details (cus_name,pr_name,price) VALUES('$_SESSION[username]','$values[product_name]','$values[product_price]')";
			//echo $sql;
			mysqli_query($conn, $sql);
		}
		header("location:CustomerHome(h).php");
	}
?>