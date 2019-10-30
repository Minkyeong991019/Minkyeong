<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body style="height:1500px">
 <?php 
//ket noi co so du lieu
$hostname = 'localhost';
$username='root';
$password='';
$dbname='LoveYa';
$port=3306;
function query($sql)
{
	global $hostname;
	global $username;
	global $password;
	global $dbname;
	global $port;
	$conn = new mysqli($hostname, $username, $password, $dbname, $port);
	if($conn->connect_error)
	{
		//neu nhu ket noi khong thanh cong thi dung chuong trinh
		echo "Connection fail<br>";
		//dung chuong trinh
		die($conn->connect_error);
	}
	
	//chay cau truy van lay ket qua
	$result = $conn->query($sql);
	if(!$result)
	{
		//Neu khong co ket qua ($result=null) thi dung chuong trinh
		echo "SQL execution fail <br>";
		die($conn->error);
	}
	//lay tat ca cac ban ghi tu ket qua
	$rows = mysqli_fetch_all($result);
	return $rows;
}
function execsql($sql) // dau vao la 1 cau truy van, dau ra la mot mang
{
	global $hostname;
	global $username;
	global $password;
	global $dbname;
	global $port;
	$conn = new mysqli($hostname, $username, $password, $dbname, $port);
	if($conn->connect_error)
	{
		//neu nhu ket noi khong thanh cong thi dung chuong trinh
		echo "Connection fail<br>";
		//dung chuong trinh
		die($conn->connect_error);
	}
	
	//chay cau truy van lay ket qua
	$result = $conn->query($sql);
	return $result;
}
?>
</body>
</html>