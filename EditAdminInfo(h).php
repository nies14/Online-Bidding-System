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
		<title>	Project	</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/> <!-- for dashboard -->
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>  <!-- Font Control-->
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> <!-- Not Used -->
		<link rel = "stylesheet" href="EditAdminInfo.css">

		<script src="jquery-2.2.3.min.js"></script>  <!-- for autocomplete,side pic -->
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>  <!-- dropdown -->
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>  <!-- for side pic -->
		<script src="assets/js/chartist.min.js"></script>   <!-- Not Used -->
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
		$(document).ready(function()
			{
				$("input").keyup(function()
				{
					var str = document.getElementById("uname").value;
					$("#uname").autocomplete(
					{
						source: "EmployeeSuggestion.php?un="+str
					});
				});
			});
		</script>
	</head>
	<body>

	<div class="wrapper">
		<div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

			<div class="sidebar-wrapper">
				<div class="logo">
					<p>Employee Dashboard</p>
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
			
		<div class="container">
			<img src="man.png">
			<h2>Edit Your Profile</h2>
			<form action="EditAdminInfo.php" method="post">
				<div>			
					<input type="text" name="username" id="uname" placeholder="Enter Username">
					<br>
					<input type="text" name="salary" id="sal" placeholder="Enter Salary">
					<br>
					<input type="text" name="position" id="pos" placeholder="Enter Position">
				</br>
				<input type="submit" name="submit" value="Submit" class="btn-edit"><br/><br/>
			</form>
		</div>		
	</div>


	</body>		
	</html> 
<?php
}?>