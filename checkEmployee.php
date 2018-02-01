 <?php
	session_start();
	if(isset($_SESSION['login']))
	{
		function getJSONFromDB($sql)
		{
			$conn = mysqli_connect("localhost", "root", "","mydb");
			$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
			$arr=array();
			while($row = mysqli_fetch_assoc($result)) 
			{
				$arr[]=$row;
			}
			return json_encode($arr);
		}
		if(isset($_REQUEST['un']))
		{
			$a=$_REQUEST['un'];
			$sql="select * from employee where username = '$a'";
			//echo $sql."<br/>";
			$jsonData= getJSONFromDB($sql);
			echo $jsonData;
		}
		else
		{
			echo "invalid parameter";
		}
	}
	else
	{
		echo "<h1>Not Authorised To Go</h1>";
	}
?>