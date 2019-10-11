<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTML with JS</title>
</head>
<body>
	<h2>Enter your information!</h2>
	<table>
		<tr>
			<td>Name</td>
			<td><input type = "text" id = "name"></td>
		</tr>
		<tr>
			<td>Country</td>
			<td>
				<select name="country">
					<option value="Viet">Viet</option>
					<option value="Malaysia">Malaysia</option>
					<option value="UAE">UAE</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type = "radio" name = "" id = "gender">Male
				<input type = "radio" name = "" id = "gender">Female
			</td>
		</tr>
		<tr>
			<td>Age</td>
			<td><input type = "number" name = "" id = "age"></td>
		</tr>
		<tr>
			<td colspan = "2">
				<input type ="button" onclick = "validate()" value = "OK">
			</td>
		</tr>
	</table>

	<ul id = "errorList">
		
	</ul>

	<script>
		function validate()
		{
			var name = document.getElementById("name").vlaue;
			var gender = document.getElementById("gender");
			var age = document.getElementById("age").value;
			var document.getElementById("errorList");
			//remove the old List
			while (errorList.hasChildNodes())
			{
				errorList.removeChild(errorList.childNodes[0]);
			}
			document.getElementById("errorList").removeall;
			
			if (name.length <6)
			{
				var node = document.createElement("li");
				var textnode = document.createTextNode("Name must have at least 5 character");
				node.appendChild(textnode);
				document.getElementById("errorList").appendChild(node);
			}
			if (!gender.checked)
			{
				var node = document.createElement("li");
				var textnode = document.createTextNode("You must select a gender!");
				node.appendChild(textnode);
				document.getElementById("errorList").appendChild(node);
			}
			if (isNaN(age) || age <21)
			{
				var node = document.createElement("li");
				var textnode = document.createTextNode("Age is not a number or gender!");
				node.appendChild(textnode);
				document.getElementById("errorList").appendChild(node);
			}
		}
	</script>
</body>
</html>