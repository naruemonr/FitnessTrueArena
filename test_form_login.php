<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <!-- <form action="login.php" method="post"> -->
    <form name = "form1" action="test_login.php" method="post">

        <h1>Login</h1>
        
        <div class="input-group">
            <input type="text" name="username" placeholder = "Username" required>
        <div class="input-group">
            <input type="password" name="password" placeholder = "Password" required>
        </div>
        <div class="input-group">
            <button type="submit" name="submit" value="Login" class="btn">Login</button>
        </div>
        <p>Not yet a member? <a href="register.php">Sign Up</a></p>
    </form>

</input>
</html>


<?php 

    // if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    //     session_destroy();
    // } 

?>