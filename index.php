<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css"/>
  <script src="js/login.js"></script>
  
  <link rel="icon" href="img/favicon.ico" type="image/x-icon"> 
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <title>login</title>
</head>

<body>
<div class="login-page">
  <div class="form">
    <form  action="check_login.php" class="login-form" method="POST">
    <!-- <h2>Dole &True Arena</h2> align="left" -->
    <img src="img\Dole_Logo.png" width="90" height="50"/>&nbsp;<img src="img\trulogo.png" width="100" height="50"/>
    <br><br>
    <input placeholder="Username" type="text" name="Username" id="Username"/>
      <button>LogIn</button><br><br>
      <a href="login_admin.php" type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal" style="text-decoration: none;" font color="black">login admin</a>
    </div>
  </div>
</div>
