<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="./stylesheethome.css">
</head>
<body  style="background-color: #FDC4C4">

<table cellspacing="0" cellpadding="0" width=100% height=auto>
<tr>
	<td><img src="./Toy2.jpg" style="width: 100px; height: 100px;" style = "display: inline;" /></td>
	<td><b  style = "color: #FEFBFB; font-size: 50px;" class="logo">ATN M Toys</b></td>
	<td><input type="text"  placeholder="Search..." name="search" class="search-box"></td>
	<td><b><a href="Login.php">LOGIN</a></b></td>
	<td><img src="https://img.icons8.com/ios-glyphs/30/000000/add-shopping-cart.png"></td>
</tr>
</table>

<table cellspacing="10" cellpadding="0" width=100% height=auto>
		<tr>
			<td><div class="header">
			<ul>
				
				<li><b><a href="Assignment2(home).php">HOME</a></b></li>
				
				<li><b><a href="Allproduct.php">SHOP</a></b></li>
				
			</ul>
			</div>
			</td>
		</tr>
</table>

		 <form method="POST" action="login.php" >
        <table style="margin-left: 37%;" height="300" >
        	<tr>
				<td align="center" colspan="2"><h1>LOGIN</h1></td>

			</tr>
            <tr>
		<td width="150"><b>Username:</b></td>
		<td width="250"><input type="name" name="username"><br></td>
	</tr>
	<tr>
		<td width="150"><b>Password:</b></td>
		<td width="250"><input type="password" name="password"><br></td>
	</tr>
	<tr>
    	<td align="center" colspan="2"><b><a href="DBLogin.php"><input type ="button" id = "login" value="Log In"></a></b>

		</td>
	</tr>
        </table>
    </form>

    <?php  
		 require('DBLogin.php');

		if (isset($_POST['username']) and isset($_POST['password'])){
			
			// Assigning POST values to variables.
			$username = $_POST['username'];
			$password = $_POST['password'];

			// CHECK FOR THE RECORD FROM TABLE
			$query = "SELECT * FROM `account` WHERE username='$username' and password='$password'";
			 
			$result = pg_query($connection, $query) or die(pg_error($connection));
			$count = pg_num_rows($result);

			if ($count == 1){

			//echo "login successfull will move to admin page with function are add and delete
			echo '<script>window.location="Admin(asm).php"</script>';

			}



			else{
			echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
			//echo "Invalid Login Credentials";
			}
		}
	?>


</body>
</html>