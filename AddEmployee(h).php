<?php
session_start();
if(!isset($_SESSION['login']) && $_SESSION["page"]!="admin")
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
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link rel = "stylesheet" href="AddEmployee.css">
		
		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		
		<script>
		function check()
		{
			flag=true;
				
				str=document.getElementById("uname").value;
				//document.getElementById("spinner").style.visibility= "visible";
				var xmlhttp = new XMLHttpRequest();
				var str1 = document.getElementById("pass").value;
				xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						resp=JSON.parse(xmlhttp.responseText);
						msg="";
						for(i=0;i<resp.length;i++)
						{
							//alert(resp[i].username);
							if(resp[i].username==str)
							{
								msg="name is taken";
								flag=false;
							}
							else
							{
								msg="name is okay";
								flag=true;
							}
						}
						if(resp.length==0)
						{
							msg="name is okay";
							flag=true;
						}
							
						if(str=="")
						{
							msg="name can not be empty";
							flag=false;
						}
							
						document.getElementById("crd").innerHTML = msg;
						document.getElementById("crd").style.color="red";
						
					}
					/*if(ele.getAttribute("type")=="button")
					{
						if(flag==1)
						{
							document.form.submit();
						}
					}*/				
				};
				
				var url="checkEmployee.php?un="+str;
				//alert(url);
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
		}
	
		function validate()
		{	
				flag=true;
				
				str=document.getElementById("uname").value;
				//document.getElementById("spinner").style.visibility= "visible";
				var xmlhttp = new XMLHttpRequest();
				var str1 = document.getElementById("pass").value;
				xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						resp=JSON.parse(xmlhttp.responseText);
						msg="";
						for(i=0;i<resp.length;i++)
						{
							//alert(resp[i].username);
							if(resp[i].username==str)
							{
								msg="name is taken";
								flag=false;
							}
							else
							{
								msg="name is okay";
								flag=true;
							}
						}
						if(resp.length==0)
						{
							msg="name is okay";
							flag=true;
						}
							
						if(str=="")
						{
							msg="name can not be empty";
							flag=false;
						}
							
						//document.getElementById("crd").innerHTML = msg;
						//document.getElementById("crd").style.color="red";
						
					}
					/*if(ele.getAttribute("type")=="button")
					{
						if(flag==1)
						{
							document.form.submit();
						}
					}*/				
				};
				
				var url="checkEmployee.php?un="+str;
				//alert(url);
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
				
				
				flag2=false;
				var frm = document.form;
				var val = frm.fileToUpload.value;
				var arr = val.split(".");
				var msg = "";

				if ((arr[1] != "bmp" && arr[1] && "png" && arr[1] && "jpeg" && arr[1] && arr[1] != "jpg")&& frm.fileToUpload.value.length>0) 
				{
					//alert(arr[1]);
					flag=false;
					msg="Choose the following format(jpg,jpeg,png,bmp)";
				} 		
				
				else if(frm.username.value.length==0)
				{
					flag=false;
				}
				else if(frm.phone.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				else if(frm.psd.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				else if(frm.address.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				
				else if(frm.salary.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				else if(frm.fileToUpload.value.length==0)
				{
					flag=false;
					msg="choose a file";
				}	
				
				if(flag==false)
				{
					document.getElementById("crd").innerHTML=msg;
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
									<li><a href="#">Edit Profile</a></li>
									<li><a href="#">Sign Out</a></li>
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
			<h3>Add Employee</h3>
			<form action="AddEmployee.php" method="post" enctype="multipart/form-data" name="form">
				<div>			
					<input type="text" name="username" id="uname" placeholder="Enter Username" onkeyup="check()">
					<input type="text" name="phone" id="phn" placeholder="Enter Phone Number">				
					<input type="password" name="psd" id="pass" placeholder="Enter Password">
					<input type="text" name="position" id="pos" placeholder="Enter Position">
					<input type="text" name="address" id="addr" placeholder="Enter Address">
					<input type="text" name="salary" id="sal" placeholder="Enter Salary">
				</div>
				<div>
					<p>Choose Gender
						<input type="radio" name="gender" value="male" checked> Male
						<input type="radio" name="gender" value="female"> Female
						<input type="radio" name="gender" value="other"> Other
					</p>
					<br/>
					Choose: <input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				</br>
				<p id="crd"></p>
				<input type="submit" onclick="return validate();" value="Submit" class="btn-edit" >
				<br/><br/>
			</form>
		</div>
			
	</body>
	</html> 
<?php
}?>
