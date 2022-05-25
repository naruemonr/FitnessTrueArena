
<?php include("menu_register.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/register.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
 
  <title>register_admin</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form  action ="registeradmin.php" class="login-form" method="POST">
    <h2>Register Admin</h2>
    <input placeholder="Username " type="text" name="username" id="Name-lastname"/>
    <input placeholder="Employee ID " type="text" name="emp_id" id="emp_id"/>
    <input placeholder="Password" type="password" name="password" id="password"/>
    <input placeholder="note" type="text" name="note" id="note"/>
      <button type="submit" name="submit">REGISTER</button><br><br>

    </div>
  </div>
</div>
