<?php
session_start();
if(!isset($_SESSION['login']))
{
	echo "<h1>Not Authorised To Go</h1>";
}
else
{
	$sql="select * from product";
	$conn = mysqli_connect("localhost", "root", "","mydb");
	$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
	//print_r($_SESSION);
	if($_GET["signal"]=="add")
	{
		if(isset($_SESSION["cart"]))
		{
			$item_nm = array_column($_SESSION["cart"],"product_id");
			//print_r($item_nm);
			if(!in_array($_GET["id"],$item_nm))
			{
				$count=count($_SESSION["cart"]);
				$item_array= array(
				"product_name"=>$_POST["hidden_name"],
				"cus_name"=>$_POST["hidden_cus_name"],
				"product_price"=>$_POST["bid_amount"],
				"product_id"=>$_POST["hidden_id"]
				);
				$_SESSION["cart"][$count]=$item_array;
				$sql="INSERT INTO order_details (cus_name,pr_name,price,pr_id) VALUES('$_SESSION[username]','$_POST[hidden_name]','$_POST[bid_amount]','$_POST[hidden_id]')";
				//echo $sql;
				mysqli_query($conn,$sql);
				echo '<script>alert("Products has added to cart")</script>';
				echo '<script>window.location="ShowCart.php"</script>';
			}

			else
			{
				$f=0;
				foreach($_SESSION["cart"] as $keys => $values)
				{
					if(($values["product_name"]==$_POST["hidden_name"]) &&($values["cus_name"]==$_POST["hidden_cus_name"]))
					{
						$e=$values["product_price"];
						$p=$_POST["bid_amount"];
						//$_SESSION["cart"][$keys]["product_price"]=$p;
						//echo $_SESSION["cart"][$keys]["product_price"];
						break;
					}
					$f++;
				}
				if((in_array($_GET["id"],$item_nm)) && ($p>$e))
				{
					$_SESSION["cart"][$f]["product_price"]=$p;
					$sql="UPDATE order_details SET price='".$_POST["bid_amount"]."'
						WHERE cus_name='".$_SESSION['username']."' AND pr_name='".$_POST['hidden_name']."'";
					//echo $sql;
					mysqli_query($conn,$sql);
					echo '<script>alert("Product Bid Amount Updated")</script>';
					echo '<script>window.location="ShowCart.php"</script>';
				}
				else
				{
					echo '<script>alert("Products already added to cart")</script>';
					echo '<script>window.location="ShowCart.php"</script>';
				}
			}
			
		}

		else
		{
			$item_array= array(
				"product_name"=>$_POST["hidden_name"],
				"cus_name"=>$_POST["hidden_cus_name"],
				"product_price"=>$_POST["bid_amount"],
				"product_id"=>$_POST["hidden_id"]
			);
			//print_r($item_array);
			$_SESSION["cart"][0]=$item_array;
			$sql="INSERT INTO order_details (cus_name,pr_name,price,pr_id) VALUES('$_SESSION[username]','$_POST[hidden_name]','$_POST[bid_amount]','$_POST[hidden_id]')";
			//echo $sql;
			mysqli_query($conn,$sql);
			echo '<script>window.location="ShowCart.php"</script>';
		}
	}

	if(isset($_GET["signal"]))
	{
		if($_GET["signal"] == "delete")
		{
			foreach($_SESSION["cart"] as $keys => $values)
			{
				if($values["product_id"] == $_GET["id"])
				{
					unset($_SESSION["cart"][$keys]);
					//echo '<script>alert("Product has been removed")</script>';
					echo '<script>window.location="ShowCart.php"</script>';
				}
			}
		}
	}
}

?>