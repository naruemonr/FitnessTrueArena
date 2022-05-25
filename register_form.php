<?php include("menu_register.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
</head>
 
  <title>register_member</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form  action ="register.php" class="login-form" method="POST">
    <h3  >Register new member</h3><br>
    <input placeholder="*Name-Lastname " type="text" name="name_lastname" id="name-lastname" required="required"/>
    <input placeholder="*Employee id" type="text" name="emp_id" id="emp_id" required="required"/>
    <input placeholder="*Department" type="text" name="dept_name" id="dep_id" required="required"/>
    <input placeholder="Telephone" type="text" name="tel" id="tel" />
    <input placeholder="E-mail" type="text" name="email" id="email" />
      <button type="submit" name="submit">REGISTER</button><br><br>
    


    </div>
  </div>
</div>