<html>
<head>
<title>ThaiCreate.Com</title>
</head>
<body>
<?php
$host = "localhost:90";
$username = "root";
$password = "P@ssw0rd";
$objConnect = mysqli_connect($host,$username,$password);

if($objConnect)
{
	echo "MySQL Connected";
}
else
{
	echo "MySQL Connect Failed : Error : ".mysql_error();
}

mysqli_close($objConnect);
?>
</body>
</html>