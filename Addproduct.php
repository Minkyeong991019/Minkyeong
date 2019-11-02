<!DOCTYPE html>

<html>
	<head>
    	<meta charset="UTF-8">
    	<title>Add New Product </title>
    	<link rel="stylesheet" href="./stylesheethome.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body  style="background-color: #FDC4C4">
    	<br>

	<table cellspacing="0" cellpadding="0" width=100% height=auto>
		<tr>
			<td><img src="./Toy2.jpg" style="width: 100px; height: 100px;" style = "display: inline;" /></td>
			<td><b  style = "color: #FEFBFB; font-size: 50px;" class="logo">ATN M Toys</b></td>
			<td><input type="text"  placeholder="Search..." name="search" class="search-box"></td>
			<td><b><a href="Admin.php">PRODUCT</a></b></td>
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
require_once './index.php';
if(isset($_POST['toyid'], $_POST['toyname'], $_POST['image'], $_POST['price'], $_POST['catid']))
{
    $image = "";
    $extension = "";
    
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        $temp_name = $_FILES['image']['tmp_name'];
        $name = $_FILES['image']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $image = "$toyid.$extension";
        $destination = "./images/$image";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    
   
    
        
    // mysql query to insert data
    $sql = "INSERT INTO Toyproduct (toyid, toyname, image, price, catid ) 
                    values (:toyid, :toyname, :image, :price, :catid)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':toyid', $_POST['toyid'], PDO::PARAM_STR);
    $stmt->bindValue(':toyname', $_POST['toyname'], PDO::PARAM_STR);
    $stmt->bindValue(':image', $_POST['image'], PDO::PARAM_STR);
    $stmt->bindValue(':price', $_POST['price'], PDO::PARAM_STR);
    $stmt->bindValue(':catid', $_POST['catid'], PDO::PARAM_STR);
  
   
    $pdoExec = $stmt->execute();
    
        // check if mysql insert query successful
    if($pdoExec)
    {
        echo 'Data Inserted';
    }else{
        echo 'Data Not Inserted';
    }
}
?> 

		<table>
		    <h2><a style="color: black; font-size: 20px;">Add New Product</a></h2>
		</table>

        <form action="Addproduct.php" method="post">

            <input type="text" name="toyid" required placeholder="Toyid"><br><br>

            <input type="text" name="toyname" required placeholder="ToyName"><br><br>

            <input type="text" name="image" required placeholder="Image"><br><br>

            <input type="number" name="price" required placeholder="Price"><br><br>

             <input type="number" name="catid" required placeholder="CatId"><br><br>

			

            <input type = "submit" value = "Insert Data">

        </form>

        <table>
		    <h2><a style="color: black; font-size: 20px; margin-left: 26%;" href="./Admin.php">Back to Admin Page</a></h2>
		</table>
       

    </body>

</html>
