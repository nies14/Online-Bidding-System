<?php
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
		$sql="select * from customer";
		$jsonData= getJSONFromDB($sql);
		
		$a=1;
		
		$jsn=json_decode($jsonData);
		for($i=0;$i<sizeof($jsn);$i++)
		{
			if($jsn[$i]->username==$_POST['username'])
			{
				$a=0;
				echo "<h1>Username Taken</h1>";
				break;
			}
			
		}
		
		if($a==1)
		{
			$conn = mysqli_connect("localhost", "root", "","mydb");
			$p=md5($_POST["password"]);
			$sql="INSERT INTO customer (username,address,phone,password) VALUES('$_POST[username]','$_POST[address]','$_POST[phone]','$p')";
			mysqli_query($conn, $sql) or die(mysqli_error());
			header("location:login.html");
		}
		
		
	//
?>