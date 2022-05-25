<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <title>cancel</title>
</head>
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 0 0 0 ;
  margin: 90px auto 90px auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 500px;
  width: 500px;
  margin: 10px auto 10px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 400px;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: rgb(44, 154, 182);
  width: 30%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: rgb(66, 153, 149);
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: rgb(83, 167, 160);
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #daf1ee; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #daf1ee, #daf1ee);
  background: -moz-linear-gradient(right, #daf1ee, #daf1ee);
  background: -o-linear-gradient(right, #daf1ee, #daf1ee);
  background: linear-gradient(to left, #daf1ee, #daf1ee);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<body>
  <?php
    include ("menu_calendar.php"); 

    $emp_id = $_POST['emp_id']."<br>";
    $date_cancel = $_POST['date_cancel'];
   
   
  ?>
<div class="login-page">
  <div class="form">
    <form  action="cancel_admin.php" class="login-form" method="POST">
    <h3>Please enter a reason</h3> 
    <br>
    <input placeholder="Input your reason" type="text"  required="required" name="remark" id="remark"/> <br>
    <input  type="hidden" name="date_cancel" value="<?=$_POST['date_cancel'];?>"> 
    <input  type="hidden" name="emp_id" value="<?=$_POST['emp_id'];?>">
    <button class="btn btn-danger btn-sm"  name="cancel" >save</button> 
     



    </div>
  </div>

  