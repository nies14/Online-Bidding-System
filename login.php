 <?php
 //$_REQUEST['un']="abc";
 //$_REQUEST['pn']="1234";
function getJSONFromDB($sql)
{
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	
	session_start();
	$cnt=mysqli_num_rows($result);
	if($cnt==1)
	{
		$_SESSION["login"]="valid";
		$_SESSION["username"]=$_REQUEST['un'];
	}
	if($cnt==0)
	{
		header("location:login2.php?un=".$_REQUEST['un']."&pn=".$_REQUEST['pn']);
	}
	$res=-1;
	while($row = mysqli_fetch_assoc($result)) 
	{
		$res++;
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
	$jsn=json_decode($jsonData);
	for($i=0;$i<sizeof($jsn);$i++)
	{
		if($jsn[$i]->password==md5($_REQUEST['pn']))
		{
			$jsn[$i]->password=$_REQUEST['pn'];

			//echo $jsn[$i]->password."<br/>";
			if($jsn[$i]->position=="admin")
			{
				$_SESSION["page"]="admin";
				//echo $_SESSION["page"];
			}
			if($jsn[$i]->position=="employee")
			{
				$_SESSION["page"]="employee";
				//echo $_SESSION["page"];
			}
		}
		
	}
	$jsonData=json_encode($jsn);
	echo $jsonData;
}
else
{
	echo "invalid parameter";
}
?>