 <?php
	 session_start();
	 if(isset($_SESSION['login']))
	 {
		if(isset($_POST['delete']))
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
				 $sql="delete from order_details where pr_name= '$a' AND cus_name='$b'";
				 mysqli_query($conn, $sql);
			 }
			 header("location:ManageOrders(h).php");
		}
		else
		{
			header("location:ManageOrders(h).php");
		}
	 }
	 else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>