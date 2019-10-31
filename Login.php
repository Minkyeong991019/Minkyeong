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

    <a href="min99.php">min99</a>


</body>
</html>