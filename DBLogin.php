<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src = "https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="crossorigin="anonymous"></script>
	<script src = "https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
	<style>
		#userList {
			  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

		#userList td, #userList th {
			  border: 1px solid #ddd;
			  padding: 8px;
			}

		#userList tr:nth-child(even){background-color: #f2f2f2;}

		#userList tr:hover {background-color: #ddd;}

		#userList th {
			  padding-top: 12px;
			  padding-bottom: 12px;
			  text-align: left;
			  background-color: #4CAF50;
			  color: white;
			}
	</style>

	<title>DBLogin</title>
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
	<table style="margin-left: 45%;" align="center">
        <tr>
			<td align="center" colspan="2" style=""><h1>Add New PRODUCT</h1></td>
		</tr><br/><br>
		<tr>
			<td>ToyName</td>
			<td><input type = "text" name = "" id = "toyname"></td>
		</tr><br>
		<tr>
			<td>Image</td>
			<td><input type = "text" name = "" id = "image"></td>
		</tr><br>
		<tr>
			<td>Price</td>
			<td><input type = "text" name = "" id = "price"></td>
		</tr><br>
		<tr>
			<td>CatID</td>
			<td>
				<select id = "catid">
					<option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "3">3</option>
				</select>
			</td>
		</tr><br>
		<tr>
			<td><input type = "button" id = "btnAdd" value = "Add"></td>
		</tr><br/><br>
	</table>
	
	
		


	
	Name to search
	<input type = "text" name = "" id = "nameSearch">
	<input type = "button" value = "Search" id = "btnSearch">
	<table width = "300px" id = "userList" border = "1">
		<thead>
		<tr>
			<th>ToyID</th>
			<th>ToyName</th>
			<th>Image</th>
			<th>Price</th>
			<th>CatID</th>
		</tr>
		</thead>
		<tbody></tbody>

	</table>

	<script type = "text/javascript">
		//List store all names which have been entered
		var toynameList = [];
		$(document).ready(function()
		{
			$("#btnAdd").click(function(event) {
				var toyid = $("#toyid").val();
				var toyname = $("#toyname").val();
				var image = $("#image").val();
				var price = $("#price").val();
				var catid = $("#catid").val();
				var row = "<tr>" + "<td>" + toyid + "</td>" + "<td>" + toyname + "</td>" "<td>" + image + "</td>" +"<td>" + price + "</td>" +"<td>" + catid + "</td>" + + "</tr>";
				$("#userList tbody").append(row);
				toynameList.push(toyname); //add new name to the List
			});
			//perform search
			$("#btnSearch").click(function(event) {
				var toyname = $("#toynameSearch").val();
				var found = false;
				for (var i = 0; i < toynameList.length; i++) {
					if (toynameList[i] == toyname)
					{
						found = true;
						break;
					}
				}
				if(found)
				{
					alert("Found " + toyname);
				}
				else
				{
					alert("Not found " + toyname);
				}
			});
		});
	</script>




</body>
</html>