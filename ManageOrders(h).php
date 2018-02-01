<?php
session_start();
if(!isset($_SESSION['login']))
{
	echo "<h1>Not Authorised To Go</h1>";
}
else
{?>
	<!doctype html>
	<html lang="en">
	<head>
		<style>
			table 
			{
				font-family: arial, sans-serif;
				border-collapse: collapse;
				width:60%;
			}

			table,td, th 
			{
				border: 1px solid #dddddd;
				text-align: left;
				padding: 8px;
			}

			tr:nth-child(even) 
			{
				background-color: #dddddd;
			}
		</style>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>	Project	</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/> <!-- for dashboard -->
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>  <!-- Font Control-->
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> <!-- Not Used -->
		<link rel = "stylesheet" href="EmployeeList.css">
		
		<script src="jquery-2.2.3.min.js"></script>  <!-- for autocomplete,side pic -->
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>  <!-- dropdown -->
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>  <!-- for side pic -->
		<script src="assets/js/chartist.min.js"></script>   <!-- Not Used -->
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
			function manage()
			{
				flag=false;
				var chk=document.form2.getElementsByTagName("input");
				for (var i=0; i<chk.length; i++) 
				{       
				   if (chk[i].type == "checkbox" && chk[i].checked == true)
				   {
					  flag=true;
					  document.form2.submit();
				   }
				}
				return flag;
			}
		</script>
	</head>
	<body>

		<div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

			<div class="sidebar-wrapper">
				<div class="logo">
					<p>Admin Dashboard</p>
					<br/>
					<br/>
				</div>

				<ul class="nav">
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-globe"></i>
										<span class="notification"></span>User Profile
								</a>
								<ul class="dropdown-menu">
									<li><a href="EditEmployeeInfo(h).php">Edit Profile</a></li>
									<li><a href="ShowEmployeeInfo(h).php">Show Profile</a></li>
									<li><a href="logout.php">Sign Out</a></li>
								</ul>
					</li>         			
				</ul>
				
			</div>
			
			
		</div>
		<div>
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">
					<div class="navbar-header">
						
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="Home.php"> Home</a>
							</li>
							
							<li>
								<a href="logout.php">
									Log out
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav> 
		</div>
			
		<div>
			<h3 align="center">Bid List</h3>
			<form action="DeleteBid.php" method="post" name="form">
			<div align="center" style="overflow-x:auto;">
			<?php
				echo '<table>';
				$sql="select * from order_details";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				echo '<tr>
					<td></td>
					<td>'."<b>Product Name</b>".'</td>
					<td>'."<b>Customer Name</b>".'</td>
					<td>'.'<b>Bid Price</b>'.'</td>
					</tr>';
				$t=0;
				while($row = mysqli_fetch_assoc($result)) 
				{	
					echo '<tr>';?>
					<td><input name="checkbox[]" type="checkbox" value="<?php echo $row['pr_name'].",".$row['cus_name'].",".$row['price']; ?>"></td>
					<?php
					echo '<td>'.$row["pr_name"].'</td>
					<td>'.$row["cus_name"].'</td>
					<td>'.$row["price"].'</td>';										
					echo '</tr>';
					?>
					<input type="hidden" value="<?php echo $row['pr_name'].",".$row['cus_name'].",".$row['price']; ?>">
					<?php
					/*$item_array= array(
						"product_name"=>$row["pr_name"],
						"cus_name"=>$row["cus_name"],
						"product_price"=>$row["price"],
					);
					$_SESSION["winner"][$t++]=$item_array;*/
				}
				echo '</table>';
			?>
			</div>
			<br/><br/>
			<div style="padding-left:275px">
				<input type="submit" name="delete" value="Delete" class="btn-delete"><br/><br/>
				<p id="cd"></p>
			</div>
			</form>
			
			<form  action="winner.php" method="post" name="form2">
			<h3 align="center">Bid List</h3>
			<div align="center" style="overflow-x:auto;">
			<?php
				echo '<table  >';
				$sql="select * from order_details";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				echo '<tr>
					<td></td>
					<td>'."<b>Product Name</b>".'</td>
					<td>'."<b>Customer Name</b>".'</td>
					<td>'.'<b>Bid Price</b>'.'</td>
					</tr>';
				$t=0;
				while($row = mysqli_fetch_assoc($result)) 
				{	
					echo '<tr>';?>
					<td><input name="checkbox[]" type="checkbox" value="<?php echo $row['pr_name'].",".$row['cus_name'].",".$row['price']; ?>"></td>
					<?php
					echo '<td>'.$row["pr_name"].'</td>
					<td>'.$row["cus_name"].'</td>
					<td>'.$row["price"].'</td>';										
					echo '</tr>';
					?>
					<input type="hidden" value="<?php echo $row['pr_name'].",".$row['cus_name'].",".$row['price']; ?>">
					<?php
					/*$item_array= array(
						"product_name"=>$row["pr_name"],
						"cus_name"=>$row["cus_name"],
						"product_price"=>$row["price"],
					);
					$_SESSION["winner"][$t++]=$item_array;*/
				}
				echo '</table>';
			?>
			</div>
			<br/><br/>
			<div style="padding-left:275px">
				<input type="button" name="final" onclick="manage()" value="Decleare Winner" class="btn-delete"><br/><br/>
				<p id="cd"></p>
			</div>	
			</form>
		</div>
			
	</body>
	</html> 
<?php
}?>