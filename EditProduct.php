<?php
	session_start();
	if(isset($_SESSION['login']))
	{
		$target_dir = "uploads2/";
		$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
		echo "<script>alert $target_file</script>";
		$uploadOk = 1;
		
		
			
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$sql = "UPDATE product SET pr_Name='".$_POST['pname']."',
					b_price='".$_POST['buy']."', s_price='".$_POST['sell']."'
					WHERE pr_name='".$_COOKIE["product"]."'";
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
						$sql = "select * from product WHERE pr_name='".$_SESSION['product']."'";
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
							if($jsn[$i]->pr_name==$_SESSION['product'])
							{
								$photo=$jsn[$i]->photo;
								//echo $photo;
								unlink($photo);
							}
							
						}
						
						move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
						$sql = "UPDATE product SET photo='".$target_file."' WHERE pr_name='".$_SESSION['product']."'";
						mysqli_query($conn, $sql);
					}
					
					$_SESSION["product"]=$_POST['pname'];
					echo '<script language="javascript">';
					echo 'alert("Prduct Updated Successfully")';
					echo '</script>';
					
					header("location:ProductList(h).php");
					
					
				} 
				else 
				{
					echo '<script language="javascript">';
					echo 'alert("Profile Did not Update Successfully")';
					echo '</script>';
				
					header("location:ProductList(h).php");
					
				}
				
		
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
	
?>
