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
		<title>Project</title>
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/animate.min.css" rel="stylesheet"/>
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link rel = "stylesheet" href="EditEmployeeInfo.css">
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		
		<script>
			function validate()
			{
				flag=true;
				var frm=document.form;
				var str = frm.email.value;;
				var n=0;
				var n1=0;
				
				n = str.indexOf("@");
				n1 = str.indexOf(".");

				if(n>0 && n1>0)
				{
					flag=true;
				}
				
				else
				{
					flag=false;
					document.getElementById("crd").innerHTML="mail address is not ok";
					document.getElementById("crd").style.color="red";
				}
				if((frm.username.value.length==0) || (frm.phone.value.length==0) || (frm.fname.value.length==0) || (frm.lname.value.length==0) || (frm.password.value.length==0) || (frm.cpsd.value.length==0)	|| (frm.address.value.length==0))		
				{
					flag=false;
					document.getElementById("crd").innerHTML="provide all information";
					document.getElementById("crd").style.color="red";
				}
				if(frm.password.value != frm.cpsd.value && frm.password.value.length>0)
				{
					flag=false;
					document.getElementById("crd").innerHTML="password did not match";
					document.getElementById("crd").style.color="red";
				}
				
				var val = frm.fileToUpload.value;
				var arr = val.split(".");

				if ((arr[1] != "bmp" && arr[1] && "png" && arr[1] && "jpeg" && arr[1] && arr[1] != "jpg")&& frm.fileToUpload.value.length>0) 
				{
					//alert(arr[1]);
					flag=false;
					document.getElementById("crd").innerHTML="Choose the following format(jpg,jpeg,png,bmp)";
					document.getElementById("crd").style.color="red";
				}
				
				return flag;
			}
		</script>

	</head>
	<body>

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
			<h4>Edit Your Profile</h4>
			<form action="EditEmployeeInfo.php" method="post" enctype="multipart/form-data" name="form">
				<?php
				$a=$_SESSION["username"];
				$sql="select * from employee where username='$a'";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$row = mysqli_fetch_assoc($result); 
				?>
				<div>			
					<input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo $row["username"]?>">
					<input type="text" name="phone" id="phone" placeholder="Enter Phone Number" value="<?php echo $row["phone"]?>">
					<input type="text" name="fname" id="fname" placeholder="Enter Firstname" value="<?php echo $row["first_name"]?>">			
					<input type="text" name="lname" id="lname" placeholder="Enter Lastname" value="<?php echo $row["last_name"]?>">
					<input type="text" name="email" id="email" placeholder="Enter Email Address" value="<?php echo $row["email"]?>">
					<input type="text" name="address" id="address" placeholder="Enter Address" value="<?php echo $row["address"]?>">					
					<input type="password" name="password" id="password" placeholder="Enter Password">				
					<input type="password" name="cpsd" id="cpsd" placeholder="Confirm Password">
				</div>
				<div>
					<p>Choose Gender
					<input type="radio" name="gender" value="male" checked> Male
					<input type="radio" name="gender" value="female"> Female
					<input type="radio" name="gender" value="other"> Other
					</p>
				</div>
				<br/>
					Choose: <input type="file" name="fileToUpload" id="fileToUpload">
				<p id="crd"></p>
				</br>
				<input type="submit" name="submit" onclick="return validate();"value="Submit" class="btn-edit"><br/><br/>
			</form>
		</div>		

	</body>
	</html> 
<?php
}?>