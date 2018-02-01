<?php
	session_start();
	if(isset($_SESSION['login']) && $_SESSION["page"]=="admin")
	{
		
		$conn = mysqli_connect("localhost", "root", "","mydb");
		
		$sql = "UPDATE employee set salary='".$_POST['salary']."',
		position='".$_POST['position']."'
		WHERE username='".$_POST['username']."'";
		
		//echo $sql;
					
		if (!$conn) 
		{
			die("Connection failed: " . mysqli_connect_error());
		}
		if (mysqli_query($conn, $sql)) 
		{
			echo '<script language="javascript">';
			echo 'alert("Profile Updated Successfully")';
			echo '</script>';
			header("location:AdminHome(h).php");
		} 
		else 
		{
			echo '<script language="javascript">';
			echo 'alert("Profile Did not Update Successfully")';
			echo '</script>';
			header("location:AdminHome(h).php");
		}
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
