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
		<link href="font-family.css" rel='stylesheet'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link href="CustomerHome.css" rel="stylesheet">
		<link href="ImageGallery.css" rel = "stylesheet" >
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
		/*function Validate()
		{
			//alert("fmg");
			str=document.getElementById("h_name").value;
			str1=document.getElementById("h_c").value;
			var xmlhttp = new XMLHttpRequest();
			var flag=1;
			alert(str);
			xmlhttp.onreadystatechange = function() 
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
				{
					resp=JSON.parse(xmlhttp.responseText);
					msg="";
					for(i=0;i<resp.length;i++)
					{
						if(resp[i].pr_name==str && resp[i].cus_name==str1)
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
			
			var url="checkOrder.php?un="+str;
			xmlhttp.open("GET", url, true);
			xmlhttp.send();
		}*/
		
		$(document).ready(function()
		{
			$("input").keyup(function()
			{
				var str = document.getElementById("search").value;
				$("#search").autocomplete(
				{
					source: "ProductSuggestion.php?un="+str
				});
			});
		});
		</script>
	</head>
	<body>

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
									<li><a href="ShowCustomerInfo(h).php">Show Profile</a></li>
									<li><a href="EditCustomerInfo(h).php">Edit Profile</a></li>
									<li><a href="logout.php">Sign Out</a></li>
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
		<div style="padding-left:300px">
			<input type="text" name="sname" id="search" placeholder="Search Product" size="35px">
			<input type="submit" name="submit" value="Search" class="btn-search" onclick="check()">
		</div>
		
		<br/><br/>
		
		
				
			<div style="padding-left:300px" style="width:60%">			
						<?php
							$sql="select * from product";
							$conn = mysqli_connect("localhost", "root", "","mydb");
							$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
							$arr=array();
							if(mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_assoc($result)) 
								{	
									?>
									<div class="responsive" >
										<div class="gallery" >
										 <form action="cart.php?signal=add&id=<?php echo $row["id"]; ?>" method="post" id="form">
										<!--<a href="ProductDetails(h).php?pn=<?php //echo $row["pr_name"];?>" style="color:black"> -->
											<?php 
											if(strlen($row["photo"])>0)
											{
												?><img src="<?=$row["photo"]?>" width="100" height="100"/><!-- class="pull-right img-responsive" -->
												<?php
											}
											else
											{
												echo "No Image";
											}
											?>
											<div class="desc">
												<p><?php echo $row["pr_name"];?></p>
												<p><?php echo $row["s_price"];?></p>
											</div>
											<input type="hidden" name="hidden_id" id="h_id" value="<?php echo $row["id"];?>">
											<input type="hidden" name="hidden_name" id="h_name" value="<?php echo $row["pr_name"];?>">
											<input type="hidden" name="hidden_price" id="h_price" value="<?php echo $row["s_price"];?>">
											<input type="hidden" name="hidden_cus_name" id="h_c" value="<?php echo $_SESSION["username"];?>">
											<center><input type="text" name="bid_amount" style="width:100px"></center>
											<center><input type="submit" onclick="" value="Make a Bid" class="btn-search"></center>
										<!--</a>-->
										</form>
										</div>
									</div>
									<?php
								}	
							}
						?>
					
			</div>
		
	</body>
	</html>
<?php
}?>