<?php 

  include ("connect.php");
  ob_start();
session_start();
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="calendar.php"><img src="img/back.png"  style="display: inline;" height="20" width="20">&nbsp;&nbsp;Dole & True Arena</a>
  </div>

 
    <ul class="nav navbar-nav navbar-right">
    <li><a><?php echo $_SESSION['ses_emp_id']; ?></a></li>
	<li><a><?php echo $_SESSION['ses_name_last'];?></a></li>
      <li><a action ="logout.php" href="login.php">Log Out &nbsp;</a></li>
        
        </ul>
      </li>
    </ul>
    
  </div>
</nav>