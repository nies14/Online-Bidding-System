<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	Project
	</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="font-awesome.css" rel="stylesheet">
	<link href="font-family.css" rel='stylesheet'>  <!-- Font Control-->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<script src="jquery-2.2.3.min.js"></script>
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<script src="assets/js/chartist.min.js"></script>
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
                <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <span class="notification"></span>Product Section
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="AddProduct(h).php">Add Product</a></li>
								<li><a href="ProductList(h).php">Delete Product</a></li>
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
							<a href="Home.php"> Home</a>
                        </li>
                        <li>
                            <a href="login.html">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> 
	</div>
	
		
</div>


</body>
</html>
