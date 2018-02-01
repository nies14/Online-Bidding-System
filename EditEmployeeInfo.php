<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
		$uploadOk = 1;
		$pass=md5($_POST['password']);
		
			
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$sql = "UPDATE employee SET username='".$_POST['username']."',
					password='".$pass."', phone='".$_POST['phone']."',
					email='".$_POST['email']."', first_name='".$_POST['fname']."', last_name='".$_POST['lname']."'
					, gender='".$_POST['gender']."', address='".$_POST['address']."'
					WHERE username='".$_SESSION['username']."'";
					//echo $sql;
					//echo $_SESSION['username'];
					
				if (!$conn) 
				{
					die("Connection failed: " . mysqli_connect_error());
				}
				if (mysqli_query($conn, $sql)) 
				{
					if(file_exists($target_dir))
					{
						$sql = "select * from employee WHERE username='".$_SESSION['username']."'";
						$res=mysqli_query($conn, $sql);
						while($row = mysqli_fetch_assoc($res)) 
						{
							$res++;
							$arr[]=$row;
						}
						$jsn=json_encode($arr);
						$jsn=json_decode($jsn);
						$photo="";
						for($i=0;$i<sizeof($jsn);$i++)
						{
							if($jsn[$i]->username==$_SESSION['username'])
							{
								$photo=$jsn[$i]->photo;
								//echo $photo;
								unlink($photo);
							}
							
						}
						
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
						$sql = "UPDATE employee SET photo='".$target_file."' WHERE username='".$_SESSION['username']."'";
						mysqli_query($conn, $sql);
					}
					
					$_SESSION["username"]=$_POST["username"];
					echo '<script language="javascript">';
					echo 'alert("Profile Updated Successfully")';
					echo '</script>';
					if($_SESSION["page"]=="admin")
					{
						header("location:AdminHome(h).php");
					}
					else
					{
						header("location:EmployeeHome(h).php");
					}
					
				} 
				else 
				{
					echo '<script language="javascript">';
					echo 'alert("Profile Did not Update Successfully")';
					echo '</script>';
					if($_SESSION["page"]=="admin")
					{
						header("location:AdminHome(h).php");
					}
					else
					{
						header("location:EmployeeHome(h).php");
					}
				}
				
		
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
