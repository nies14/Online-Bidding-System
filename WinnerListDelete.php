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
				 $sql="delete from winner where pr_name= '$del'";
				 mysqli_query($conn, $sql);
			 }
			 header("location:WinnerList(h).php");
	 }
	 else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>