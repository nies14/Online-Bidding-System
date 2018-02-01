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
		<link href="font-family.css" rel='stylesheet'>  <!-- Font Control-->
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link href="CustomerHome.css" rel="stylesheet">
		<link rel = "stylesheet" href="ProductDetails.css">
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
		
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
								<<ul class="dropdown-menu">
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
		
		<div style="padding-left:600px">			
					<?php
						$a=$_REQUEST["pn"];
						?>
						
						<?php
						$sql="select * from product where pr_name='$a'";
						$conn = mysqli_connect("localhost", "root", "","mydb");
						$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
						$arr=array();
						while($row = mysqli_fetch_assoc($result)) 
						{	
							?>
							<div class="responsive" >
								<div class="gallery">
								<?php 
								if(strlen($row["photo"])>0)
								{
									?><img src="<?=$row["photo"]?>" width="100" height="100" /><!-- class="pull-right img-responsive" -->
									<?php
								}
								else
								{
									echo "No Image";
								}?>
									<div class="desc">
										<p><center>Name: <?php echo $row["pr_name"]."."?></center></p>
										<p><center>Price: <?php echo $row["s_price"]."."?></center></p>
									</div>
								</div>
								<br/>
								<center><input type="submit" value="Add to Cart" class="btn-add"><br/><br/></center>
							</div>
							<?php
						}			
					?>
				
		</div>
		
	</div>
	</body>
	</html>
<?php
}?>