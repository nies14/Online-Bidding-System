 <?php
	 session_start();
	 if(isset($_SESSION['login']))
	 {
		
			$conn = mysqli_connect("localhost", "root", "","mydb");
			$cnt=array();
			$arr=array();
			$cnt=count($_POST['checkbox']);
			for($i=0;$i<$cnt;$i++)
			{
				$del=$_POST['checkbox'][$i];
				$arr=explode(",",$del=$_POST['checkbox'][$i]);
				$a=$arr[0];
				$b=$arr[1];
				$c=$arr[2];
				
					$sql="select photo from product where pr_name= '$del'";
					 $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
					 while($row = mysqli_fetch_assoc($result)) 
					 {
						$arr[]=$row;
					 }
					 
					 $path=json_encode($arr);
					 
					 $total=array();
					 $total=explode(":",$path);
					 $pat=$total[1];
					 //echo $path."<br/>";
					 $total=explode('"',$pat);
					 $file =$total[1];
					 if(is_file($file))
					 {
						unlink($file);
					 }
				 
				$sql="delete from product where pr_name= '$a'";
				mysqli_query($conn, $sql);
				$sql="delete from order_details where pr_name= '$a' AND cus_name='$b'";
				mysqli_query($conn, $sql);
				$sql="insert into winner(cus_name,pr_name,price) values('$a','$b','$c')";
				echo $sql;
				mysqli_query($conn, $sql);
			}
			header("location:WinnerList(h).php");
		
	 }
	 else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>