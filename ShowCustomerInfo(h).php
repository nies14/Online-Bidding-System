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
				width:60%;
			}

			table,td, th 
			{
				border: 3px solid #dddddd;
				text-align: center;
				padding: 150px;
				height:30px;
				
			}

			tr:nth-child(even) 
			{
				background-color: #dddddd;
			}
		</style>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Project</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link rel = "stylesheet" href="ShowCustomerInfo.css">
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		
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
			<form action="EditCustomerInfo(h).php" method="post">
				 <?php
				 $a=$_SESSION["username"];
				
				$sql="select * from customer where username='$a'";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				$row = mysqli_fetch_assoc($result); 
				
					echo '<td>'?><img src="man.png"></td>;
						
					<?php
					echo "<h2>Your Profile</h2>";
					echo '<table align="center">';
					echo '<tr>
					<td>'."<b>User Name:</b>".'</td>'.'</td>
					<td>'.$row["username"].'</td>';
					echo '</tr>';
					
					echo '<tr>
					<td>'."<b>Address:</b>".'</td>'.'</td>
					<td>'.$row["address"].'</td>';
					echo '</tr>';
					
					echo '<tr>
					<td>'."<b>Phone:</b>".'</td>'.'</td>
					<td>'.$row["phone"].'</td>';
					echo '</tr>';
					
					echo '<tr>
					<td>'."<b>Password:</b>".'</td>'.'</td>
					<td>'.$row["password"].'</td>';
					echo '</tr>';
					
				echo '</table>';
			?>
			<br><br>
			<input type="submit" name="submit" value="Edit" class="btn-edit"><br/><br/>
			</form>
		</div>		
	</body>
	</html> 

<?php
}?>