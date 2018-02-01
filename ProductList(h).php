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
			function validate()
			{
				flag=false;
				var chk=document.form.getElementsByTagName("input");
				for (var i=0; i<chk.length; i++) 
				{    
					//alert(chk[i].type);
					//alert(chk[i].checked);
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
					<p>Product Dashboard</p>
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
			<h3 align="center">Product List</h3>
			<form action="DeleteProduct.php" method="post" enctype="multipart/form-data" name="form">
			<div align="center" style="overflow-x:auto;">
			<?php
				echo '<table>';
				$sql="select * from product";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				echo '<tr>
					<td></td>
					<td>'."<b>Product Name</b>".'</td>
					<td>'.'<b>Product Buying Price</b>'.'</td>
					<td>'.'<b>Product Selling Price</b>'.'</td>
					<td>'.'<b>Image</b>'.'</td>
					</tr>';
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo '<tr>';?>
					<td><input name="checkbox[]" type="checkbox" value="<?php echo $row['pr_name']; ?>"></td>
					<?php
					echo '<td>'.$row["pr_name"].'</td>
					<td>'.$row["b_price"].'</td>
					<td>'.$row["s_price"].'</td>';
					
					if(strlen($row["photo"])>0)
					{
						echo '<td>'?><img src="<?=$row["photo"]?>" width="80" height="80" />
						<?php
					}
					else
					{
						echo "<td>No Image</td>";
					}
					
					
					echo '</tr>';
				}
				echo '</table>';
			?>
			</div>
			<br/><br/>
			<div style="padding-left:275px">
				<input type="submit" onclick="return validate();" name="delete" value="Delete" class="btn-delete"><br/><br/>
				<input type="text" name="searchname" id="sbox" placeholder="Delete Product"size="35px">
				<input type="button" name="edit" value="Edit" onclick="validate2();" class="btn-delete">
				<p id="crd"></p>
			</div>	
			</form>
		</div>
			
	</div>
	</body>
	</html> 
<?php
}?>