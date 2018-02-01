<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
		//echo $_FILES["fileToUpload"]["name"]."<br>";
		$uploadOk = 1;
		// Check if image file is a actual image or fake image
		if (file_exists($target_file)) 
		{
			echo "Sorry, file already exists<br>";
			$uploadOk = 0;
		}
		
		/*if ($_FILES["fileToUpload"]["size"] > 50000000) {
			echo "File size exceeded<br>";
			$uploadOk = 0;
		}*/
		
		if ($uploadOk == 0) 
		{
			echo "Sorry, your file was not uploaded<br>";
		}
		else
		{
			if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
			{
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$p=md5($_POST["psd"]);
				$sql="INSERT INTO employee (username, address, phone,position, password, salary, join_date, gender, photo) VALUES ('$_POST[username]','$_POST[address]','$_POST[phone]','$_POST[position]','$p','$_POST[salary]',now(),'$_POST[gender]','$target_file')";
				// Check connection
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_query($conn, $sql)) 
				{
					header("location:AdminHome(h).php");
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
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
