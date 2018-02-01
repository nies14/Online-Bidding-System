<?php
	session_start();
	if(isset($_SESSION['login']))
	{
			$pass=md5($_POST['password']);
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$sql = "UPDATE customer SET username='".$_POST['username']."',
					password='".$pass."', phone='".$_POST['phone']."', address='".$_POST['address']."'
					WHERE username='".$_SESSION['username']."'";
					//echo $sql;
					
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_query($conn, $sql)) 
				{	
					$_SESSION["username"]=$_POST["username"];
					echo '<script language="javascript">';
					echo 'alert("Profile Updated Successfully")';
					echo '</script>';
					header("location:CustomerHome(h).php");
				} 
				else 
				{
					echo '<script language="javascript">';
					echo 'alert("Profile Did not Update Successfully")';
					echo '</script>';
					header("location:CustomerHome(h).php");
				}
				
		
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
