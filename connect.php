<?php


//------------------------------  ## บน serve ##  -------------------------//
// $host = "localhost";
// $user = "";
// $pass = "";
// $db = "reserve_fitness";
// $connect = mysqli_connect($host, $user, $pass, $db) or die("Connection failed: " . mysqli_connect_error());
// mysqli_set_charset($connect, "UTF-8");


////////////////////////////////บนคอมแป๋ม/////////////////////////////////////////////////////

	$hostName = "localhost";//ชื่อเครื่อง sever ที่เก็บ database
	$user = "root";
	$password = "12345678";
	$database = "reserve_fitness";
	
	$connect = mysqli_connect($hostName,$user,$password)
	or die(mysqli_error($connect));
	
	$result = mysqli_select_db($connect,$database);
	date_default_timezone_set("Asia/Bangkok");
	

	////////////////////////////////////////////////////////
?>

