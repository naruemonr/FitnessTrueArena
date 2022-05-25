<?php include("menu_calendar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register.css"/>
  <script src="js/login.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
  <title>register page</title>
</head>
<body>
<div class="login-page">
  <div class="form">
  
    <!-- <h2>Dole &True Arena</h2> align="left" -->
    <h3>REGISTER</h3>
    <br><br>
    <form  action="register_form.php" >
      <input type="submit" value="NEW MEMBER" ></form>
      <form  action="register_formadmin.php" >
       <input type="submit" value="NEW ADMIN" ></form>
	   <form  action="report_member.php" method="GET" >
       <button name = "keyword" style = "width:100%" type="submit" value="" >EDIT MEMBER </button></form>
    


    </div>
  </div>
</div>