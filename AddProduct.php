<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		$target_dir = "uploads2/";
		$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
	
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			{
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$sql="INSERT INTO product (pr_name, b_price, s_price, photo) VALUES ('$_POST[pname]','$_POST[buy]','$_POST[sell]','$target_file')";
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_query($conn, $sql)) 
				{
					if($_SESSION["page"] =="admin")
					{
						echo '<script language="javascript">';
						echo 'alert("Prduct Added Successfully")';
						echo '</script>';
						header("location:AdminHome(h).php");
					}
					
					else if($_SESSION["page"] =="employee")
					{
						echo '<script language="javascript">';
						echo 'alert("Prduct Added Successfully")';
						echo '</script>';
						header("location:EmployeeHome(h).php");
					}
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
			}
			else 
			{
				echo "Sorry, there was an error uploading your file<br>";						
			}
			
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
<br/>