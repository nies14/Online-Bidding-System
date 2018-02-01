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
		
		<script src="jquery-2.2.3.min.js"></script>  
		<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>  <!-- dropdown -->

		<script src="assets/js/light-bootstrap-dashboard.js"></script>  <!-- for side pic -->
		<script src="assets/js/chartist.min.js"></script>   <!-- Not Used -->
		<script src="jquery-ui.js"></script>  <!-- for autocomplete -->
		<script>
			function validate()
			{
				flag=false;
				var chk=document.form.getElementsByTagName("input");
				for (var i=0; i<chk.length; i++) 
				{       
				   if (chk[i].type == "checkbox" && chk[i].checked == true)
				   {
					  flag=true;
					  break;
				   }
				}
				if(flag==false)
				{
					document.getElementById("crd").innerHTML="check a name to delete";
					document.getElementById("crd").style.color="red";
				}
				return flag;
			}
			
			function validate2()
			{
				var str=document.getElementById("sbox").value;
				//alert(str);
				if(str.length>0)
				{
					
					var xmlhttp = new XMLHttpRequest();
					var flag=1;						
					xmlhttp.onreadystatechange = function() 
					{
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
						{
							//alert(xmlhttp.responseText);
							resp=JSON.parse(xmlhttp.responseText);
							//alert(resp);
							var msg="";
							for(i=0;i<resp.length;i++)
							{
								if(resp[i].pr_name==str)
								{
									document.cookie = "product="+str;
									location.href="EditProduct(h).php";
									//break;
								}
							}
							//alert("dg");
							if(resp.length==0)
							{
								flag=0;
								msg="Product does not exist";
								document.getElementById("crd").innerHTML = msg;
								document.getElementById("crd").style.color="red";
							}
								
						}				
					};
						
					var url="ProductList.php?un="+str;
					//alert(url);
					xmlhttp.open("GET", url, true);
					xmlhttp.send();	
				}
				else
				{
					document.getElementById("crd").innerHTML = "enter a name to delete";
					document.getElementById("crd").style.color="red";
				}
					
			}
			
			$(document).ready(function()
			{
				$("input").keyup(function()
				{
					var str = document.getElementById("sbox").value;
					$("#sbox").autocomplete(
					{
						source: "ProductSuggestion.php?un="+str
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
					<p>Winner Dashboard</p>
					<br/>
					<br/>
				</div>

				<ul class="nav">
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-globe"></i>
										<span class="notification"></span>Winner List
	
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
			<h3 align="center">Winner List</h3>
			<form action="DeleteProduct.php" method="post" enctype="multipart/form-data" name="form">
			<div align="center" style="overflow-x:auto;">
			<?php
				echo '<table>';
				$sql="select * from winner";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				echo '<tr>
					<td>'."<b>Product Name</b>".'</td>
					<td>'.'<b>Winner Name</b>'.'</td>
					<td>'.'<b>Winning Price</b>'.'</td>
					</tr>';
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo '<tr>';?>
					<!--<td><input name="checkbox[]" type="checkbox" value="<?php //echo $row['pr_name']; ?>"></td> -->
					<?php
					echo '<td>'.$row["pr_name"].'</td>
					<td>'.$row["cus_name"].'</td>
					<td>'.$row["price"].'</td>';	
					echo '</tr>';
				}
				echo '</table>';
			?>
			</div>
			<br/><br/>
			</form>
		</div>
			
	</div>
	</body>
	</html> 
<?php
}?>