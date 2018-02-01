 <?php
    session_start();
	if(isset($_SESSION['login']))
	{
		if(isset($_POST['delete']))
		{
		 $conn = mysqli_connect("localhost", "root", "","mydb");
		 $cnt=array();
		 $cnt=count($_POST['checkbox']);
		 for($i=0;$i<$cnt;$i++)
		  {
			 $del=$_POST['checkbox'][$i];
			 $sql="select photo from employee where username= '$del'";
			 $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			 $row = mysqli_fetch_assoc($result);
			 $arr[]=$row;
			 
			 $path=json_encode($arr);
			 
			 $total=array();
			 $total=explode(":",$path);
			 $pat=$total[1];
			 echo $path."<br/>";
			 $total=explode('"',$pat);
			 $file =$total[1];
			 if(is_file($file))
			 {
				unlink($file);
			 }
			
			 $sql="delete from employee where username= '$del'";
			 mysqli_query($conn, $sql);
		  }
		  header("location:EmployeeList(h).php");
		}
		else
		{
			header("location:EmployeeList(h).php");
		}
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>