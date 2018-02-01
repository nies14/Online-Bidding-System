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
		<title>
		Project
		</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/jquery-ui.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>  <!-- Font Control-->
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link href="CustomerHome.css" rel="stylesheet">
		<link href="ImageGallery.css" rel = "stylesheet" >
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
		/*function Validate()
		{
			var xmlhttp = new XMLHttpRequest();
			var flag=1;
			
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					resp=JSON.parse(xmlhttp.responseText);
					msg="";
					for(i=0;i<resp.length;i++)
					{
						if(resp[i].product_name==str && resp[i].cus_name==str1)
						{
							flag=0;
							break;
						}
						else
						{
							flag=1;
						}
					}
					if(flag==0)
					{
						alert("Product is already on the pending list");
					}
						
					else if(flag==1)
					{
						//alert("bk");
						document.getElementById("form").submit();
					}
				}
			};
			
			var url="ShowCartCheck.php";
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		}*/
		</script>
	</head>
	<body>

	<div class="wrapper">
		<div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">
			<div class="sidebar-wrapper">
				<div class="logo">
					<p>Customer Dashboard</p>
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
									<li><a href="#">Edit Profile</a></li>
									<li><a href="#">Settings</a></li>
									<li><a href="#">Sign Out</a></li>
								</ul>
					</li>
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-globe"></i>
										<span class="notification"></span>Product Section
								</a>
								<ul class="dropdown-menu">
									<li><a href="CustomerHome(h).php">Buy Product</a></li>
									<li><a href="ShowAllBid(h).php">Show All Bid</a></li>
									<li><a href="ShowCart.php">Show My Bid</a></li>
									<li><a href="CustomerWinnerList(h).php">Winner List</a></li>
								</ul>
					</li>
					
				</ul>
				
			</div>
			
		</div>
		<div>
			<nav class="navbar navbar-default">
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
		<br/>
		
		<br/><br/>
		<div style="padding-left:500px">
				<h2>My Bids</h2>
				<div>
					<table>
						<col width="200">
						<col width="200">
						<tr>
						<th >Product Name</th>
						<th >Bid Price</th>
						</tr>
						<?php
						//print_r($_SESSION);
						if(!empty($_SESSION["cart"]))
						{
							$total = 0;
							foreach($_SESSION["cart"] as $keys => $values)
							{
								?>
								<tr>
								<td height="40"><?php echo $values["product_name"]; ?></td>
								<td height="40"><?php echo number_format($values["product_price"],2); ?></td>
								<!--<td height="40"><a href="cart.php?signal=delete&id=<?php //echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>-->
								</tr>
								<?php 
								$total = $total + $values["product_price"];
							}
							?>
							<tr>
							<td style="font-weight: bold" height="40" align="right">Total</td>
							<td style="font-weight: bold" height="40" align="right">$ <?php echo number_format($total, 2); ?></td>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
		</div>
		<br><br/>
		
    </div>
				
		
		
	</div>
	</body>
	</html>
<?php
}?> 
 
 
 
 
 
 
 
 
 


    