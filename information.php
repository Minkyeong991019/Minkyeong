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
	<script>
		function validate()
		{
			var name = document.getElementById("name").vlaue;
			if(name.length <6)
			{
				alert("Name must have at least 5 characters");
			}
		}
	</script>
</body>
</html>