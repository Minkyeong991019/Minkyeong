<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" href="./stylesheethome.css">
</head>
<body  style="background-color: #FDC4C4">
	
	
	<br>
	<<table cellspacing="0" cellpadding="0" width=100% height=auto>
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
	<br> 
<table border="2" cellspacing="1"  width="1000" height="1000" style="margin-left: 15%">
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>CatId</th>
				 <th colspan="2">Action</th>
			</tr>
			
	
      
            <?php
                $sql = "SELECT * FROM Toyproduct";
                $stmt = $pdo->prepare($sql);        
                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) 
                {
                    $Toyid = $row['toyid'];
                    $ToyName = $row['toyname'];
                    $Image = $row['img'];
                    $Price = $row['price'];
                    $CatId = $row['catid'];
                   
                    $link_image = "./images/item/$iImage";             
                    echo "<tr>";
                    echo "<td>$Toyid</td>";                
            ?>
            <form action="updateitem.php" method="post">

                  <input type="hidden" name="toyid" value="<?php echo $row['toyid'] ?>" />
                <td><input type="text" size="5" name="toyname" required value="<?php echo $row['toyname']; ?>"/></td>          
                
                
                <td><input type="text" size="5" name="image" required value="<?php echo $row['image']; ?>"/></td>
                
                <td><input type="text" size="5" name="price" required value="<?php echo $row['price']; ?>"/></td>
                
                <td><input type="text" size="5" name="catid" required value="<?php echo $row['catid']; ?>"/></td>
                
            
              

                <td><input type="submit" value="Edit" /></td>
            </form>    
                <td>

                    <form class="frminline" action="DeleteCloud.php" method="post" onsubmit="return confirmDelete();">
                        <input type="hidden" name="toyid" value="<?php echo $row['toyid'] ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                    
                </td>

                <?php
                echo "</tr>";
            }
            ?>
            <script>
                function confirmDelete() {
                    var r = confirm("Are you sure you would like to delete ?");
                    if (r) {
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
        </table>        
    </div>	
	
		
	<table>
	    <tr>
	    	<td style="height: " align="center" colspan="2"><b><a href="DBLogin.php"><input id = "addnewproduct" value="Add New Product"></a></b>
			</td>
		</tr>
	</table>

</body>
</html>




