<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project</title>
	<link rel = "stylesheet" href="cssSignup.css">
	<link rel = "stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<script>
		function check()
		{
			alert("dgd");
				flag=true;
				str=document.getElementById("uname").value;
				var xmlhttp = new XMLHttpRequest();
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
				
				var url="checkCustomer.php";
				//alert(url);
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
		}
	
	function validate()
	{
				alert("fhg");
				flag=true;
				str=document.getElementById("uname").value;
				//document.getElementById("spinner").style.visibility= "visible";
				var xmlhttp = new XMLHttpRequest();
				
				var frm = document.form;
				var msg = "";
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
				
				var url="checkCustomer.php";
				alert(url);
				xmlhttp.open("GET", url, true);
				xmlhttp.send();
				
				else if(frm.username.value.length==0)
				{
					flag=false;
				}
				else if(frm.phone.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				else if(frm.password.value.length==0)
				{
					flag=false;
					msg="provide all info";
				}
				else if(frm.address.value.length==0)
				{
					flag=false;
					msg="provide all info";
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
	<div class="container">
		<img src="man.png">
		<form action="AddCustomer.php" method="post" enctype="multipart/form-data"  name ="form">
			<div class="form-input">
				<input type="text" name="username" id="uname" onkeyup="check()" placeholder="Enter Username">
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="Enter Password">
			</div>
			<div class="form-input">
				<input type="text" name="phone" placeholder="Enter Phone Number">
			</div>
			<div class="form-input">
				<input type="text" name="address" placeholder="Enter Address">
			</div>
			<p id="crd"></p>
			<input type="submit" onclick="return validate();" value="Sign Up" class="btn-signup"><br/>
			<a href="login.html">Already have an account? Login</a>
		</form>
	</div>
</body>
</html>

