<?php
ob_start(); 
session_start();
  include ("connect.php");
  
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
    <form name="back" action="report_member.php" method="GET">
    <input type="hidden" name="keyword" >
    <a style="display: inline;" class="navbar-brand" href="report_member.php">
    <img  src="img/back.png"style="display: inline;" height="20" width="20"> &nbsp;Dole & True Arena</a>
    </form>
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
          
        </ul>
      </li>
    </ul>
</ul>
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
 
<!-- /////////////////////////ปิดเมนู//////////////////////////////// -->

<?php
	
    $emp_id = $_POST['emp_id']."<br>";
//	echo $emp_id;

 $strSQL = "SELECT emp_id,name_lastname,dep_name,tel,email FROM member WHERE emp_id = '".$emp_id."' ";
                mysqli_query($connect,"SET NAMES UTF8");
                    $result = mysqli_query($connect,$strSQL)  or die(mysqli_error($connect));

?>
<title>edit member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="/resources/demos/style.css">

 <div class="container">
 <h3 align="center">Edit Member</h3><br>
   <div align ="center">
    <table class="table table-striped table-bordered" id ="customers" style="width:80%" >
    <thead>
        <tr>
            <th style="width:13%" style="background-color:#DFDFDF;">Employee ID</th>
            <th style="width:20%" style="background-color:#DFDFDF;">Name Lastname</th>
            <th style="width:25%" style="background-color:#DFDFDF;">Department</th>
            <th style="width:15%" style="background-color:#DFDFDF;">Tel</th>
            <th style="width:20%" style="background-color:#DFDFDF;">Email</th>    
        </tr>
    </thead>
    <?php
    $number = 1;
                 while($queryResult = mysqli_fetch_array($result)){     
    ?>    
            <tr>
                <form name="form" method="post" action="save_edit_member.php">
                <td><input type="text" class="form-control" name = "emp_id"   value= "<?php echo $queryResult["emp_id"]; ?>"></td>
                <td><input type="text" class="form-control" name = "name"     value= "<?php echo $queryResult["name_lastname"]; ?>"></td>
                <td><input type="text" class="form-control" name = "dep_name" value= "<?php echo $queryResult["dep_name"]; ?>"></td>
                <td><input type="text" class="form-control" name = "tel"      value= "<?php echo $queryResult["tel"]; ?>"></td> 
                <td><input type="text" class="form-control" name = "email"    value= "<?php echo $queryResult["email"]; ?>"></td> 
            </tr>
            </tr>
<?php                   
     $number++;
          } 
    ?>
    </table>
    <button style="width:10%" name="save" class="btn btn-success btn-sm">SAVE</button>
</form>
   </div>
   </div>
</head>
</html>