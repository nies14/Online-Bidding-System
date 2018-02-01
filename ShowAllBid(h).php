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
		
		<div>
			<h3 align="center">Bidder List</h3>
			<form action="#" method="post"  name="form">
			<div align="center" style="overflow-x:auto;">
			<?php
				echo '<table>';
				$sql="select * from order_details";
				$conn = mysqli_connect("localhost", "root", "","mydb");
				$result = mysqli_query($conn, $sql)or die(mysqli_error($conn));
				$arr=array();
				echo '<tr>
					<td></td>
					<td>'."<b>Product Name</b>".'</td>
					<td>'.'<b>Customer Name</b>'.'</td>
					<td>'.'<b>Bidding Price</b>'.'</td>
					</tr>';
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo '<tr>';?>
					<td><input name="checkbox[]" type="checkbox" value="<?php echo $row['pr_name']; ?>"></td>
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