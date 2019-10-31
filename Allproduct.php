<!DOCTYPE html>
<html>
<head>
	<title>Product</title>
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

			
			<?php 
				$name = $_POST["txtName"];
				$price = $_POST["txtprice"];
				
				
				//Refere to database 
			   $db = parse_url(getenv("DATABASE_URL"));
			   $pdo = new PDO("pgsql:" . sprintf(
			        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
			        $db["host"],
			        $db["port"],
			        $db["user"],
			        $db["pass"],
			        ltrim($db["path"], "/")
			   ));
			   $data = [
				    'toyname' => $name,
				    'price' => $price
				];
				$stmt =  $pdo->prepare("INSERT INTO product(toyname, price) VALUES (:toyname,:price)");	
				$stmt->execute($data);
			?>
			 <h2>Thank you <?php echo $name?>  for submit Product 

			 </h2>
			 <ul>
			 	<li><?php echo $price?></li>
			 </ul>
			 <a href="DBLogin.php">Login</a>
	</body>
</html>