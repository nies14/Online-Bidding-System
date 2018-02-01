 <?php
	 session_start();
	 if(isset($_SESSION['login']))
	 {
		
			 $conn = mysqli_connect("localhost", "root", "","mydb");
			 $cnt=array();
			 $cnt=count($_POST['checkbox']);
			 for($i=0;$i<$cnt;$i++)
			 {
				 $del=$_POST['checkbox'][$i];
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
				 $sql="delete from product where pr_name= '$del'";
				 mysqli_query($conn, $sql);
			 }
			 header("location:ProductList(h).php");
	 }
	 else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>