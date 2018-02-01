 <?php
 session_start();
 //$_REQUEST['un']="xyz";
function getJSONFromDB($sql)
{
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$arr=array();
	
	$cnt=mysqli_num_rows($result);
	if($cnt==1)
	{
		$_SESSION["login"]="valid";
		$_SESSION["page"]="customer";
		$_SESSION["username"]=$_REQUEST['un'];
	}
	
	$row = mysqli_fetch_assoc($result);
	$arr[]=$row;
	return json_encode($arr);
}

function cart()
{
	$a=$_REQUEST['un'];
	$sql="select * from order_details where cus_name='$a'";
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	$rowcount=mysqli_num_rows($result);
	if($rowcount>0)
	{
		$row = mysqli_fetch_assoc($result); 
		$item_array= array(
				"product_id"=>$row["pr_id"],
				"product_name"=>$row["pr_name"],
				"product_price"=>$row["price"],
				"cus_name"=>$row["cus_name"]
			);
			$_SESSION["cart"][$count++]=$item_array;
	}
	
}

if(isset($_REQUEST['un']))
{
	$a=$_REQUEST['un'];
	$sql="select * from customer where username = '$a'";
	//echo $sql."<br/>";
	$jsonData= getJSONFromDB($sql);
	$jsn=json_decode($jsonData);
	for($i=0;$i<sizeof($jsn);$i++)
	{
		if($jsn[$i]->password==md5($_REQUEST['pn']))
		{
			$jsn[$i]->password=$_REQUEST['pn'];
			//echo $jsn[$i]->password."<br/>";
		}
		
	}
	$jsonData=json_encode($jsn);
	echo $jsonData;
	cart();
}
else
{
	echo "invalid parameter";
}
?>