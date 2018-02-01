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
		<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
		<link href="font-awesome.css" rel="stylesheet">
		<link href="font-family.css" rel='stylesheet'>
		<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
		<link rel = "stylesheet" href="ProductInsert.css">

		<script src="jquery-2.2.3.min.js"></script>
		<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
		<script src="assets/js/light-bootstrap-dashboard.js"></script>
		<script src="assets/js/chartist.min.js"></script>
		
		<script>
			function check() 
			{
				//alert("ddd");
				str=document.getElementById("prn").value;
				//document.getElementById("spinner").style.visibility= "visible";
				var xmlhttp = new XMLHttpRequest();
				var flag=0;
				
				xmlhttp.onreadystatechange = function() 
				{
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
					{
						resp=JSON.parse(xmlhttp.responseText);
						msg="";
						for(i=0;i<resp.length;i++)
						{
							alert(resp[i].pr_name);
							if(resp[i].pr_name==str)
							{
								msg="name is taken";
								flag=0;
							}
							else
							{
								msg="name is okay";
								flag=1;
							}
						}
						if(resp.length==0)
						{
							msg="name is okay";
							flag=1;
						}
							
						if(str=="")
						{
							msg="name field can not be empty";
							flag=0;
						}
							
						document.getElementById("crd").innerHTML = msg;
						if(flag==0)
							document.getElementById("crd").style.color="red";
						else if(flag==1)
							document.getElementById("crd").style.color="green";
						
					}				
				};
				
				var url="checkProduct.php?un="+str;
				//alert(url);
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
			}
			
			function validate()
			{
				flag=true;
				var val = document.form.fileToUpload.value;
				var arr = val.split(".");
				var frm = document.form;
				var msg="";
				if ((arr[1] == "gif" || arr[1] == "bmp" || arr[1] == "jpeg" || arr[1] == "jpg") && frm.fileToUpload.value.length>0)
				{
					flag=true;
				} 
				else if(frm.fileToUpload.value.length==0)
				{
					flag=false;
				}
				else if(frm.pname.value.length==0)
				{
					flag=false;
					msg="username field can not be empty";
				}
				else if(frm.sell.value.length==0)
				{
					flag=false;
					msg="sell amount field can not be empty";
				}
				else if(frm.buy.value.length==0)
				{
					flag=false;
					msg="buy amount field can not be empty";
				}
				
				else if(frm.file.value.length==0)
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
										<span class="notification"></span>Product Section
								</a>
								<ul class="dropdown-menu">
									<li><a href="AddProduct(h).php">Add Product</a></li>
									<li><a href="ProductList(h).php">Delete Product</a></li>
									<li><a href="EditProduct(h).php">Edit Product</a></li>
									<li><a href="ProductList(h).php">Product List</a></li>
									<li><a href="ManageOrders(h).php">Manage Bid</a></li>
									<li><a href="WinnerList(h).php">Winner List</a></li>
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
								<a href="Home.php"> Home </a>
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
			<h3>Add Product</h3>
			<form action="AddProduct.php" method="post" enctype="multipart/form-data" name="form">
				<div>			
					<input type="text" name="pname" id="prn" placeholder="Enter Product Name" onkeyup="check()">			
					<input type="text" name="sell" placeholder="Enter Selling Price">
					<input type="text" name="buy" placeholder="Enter Buying Price"><br/>
					Choose: <input type="file" name="fileToUpload" id="fileToUpload">
				</div>
				<br/>
				<p id="crd"></p>
				<input type="submit" onclick="return validate();" value="Submit" class="btn-edit" >
			</form>
		</div>
			
	</body>
	</html> 
	<?php
}?>

