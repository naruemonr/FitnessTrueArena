<?php 
  include ("connect.php");
  session_start();
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
	<div align = "left">
    <a  style="display: inline;" class="navbar-brand" href="register_page.php"><img src="img/back.png"  style="display: inline;" height="20" width="20">&nbsp; Dole & True Arena</a></div>
	
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">MENU<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href=""></a></li>
		  <li><a href="report_page.php" >Report</a></li>
      <li><a href="register_page.php">Register</a></li>
      <li><a href="close.php">Close booking</a></li>
    
          <!--<li><a href="close_reserve.php">Close Reserve</a></li>
          <li class="divider"></li>
          <li><a href="register_page.php">Register</a></li>-->
          
        </ul>
      </li>
    </ul>
    <div class="col-sm-3 col-md-3">
      
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a><?php echo $_SESSION['ses_note']; ?></a></li>
      <li><a action ="logout.php" href="login.php">Log Out &nbsp;</a></li>
        
        </ul>
      </li>
    </ul>
    
  </div><!-- /.navbar-collapse -->
</nav>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
