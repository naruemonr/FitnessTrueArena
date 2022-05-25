<?php
 include ("connect.php");
 include ("menu_user.php"); 
// include ("check.php");
 
// session_start();
// echo $_SESSION['ses_username'];
  
 //if ($_SESSION['ses_username']=="") {
//	header("Location:index.php");
//	exit();
//}
 
 
?>

<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);



 $now_date = $_GET['date'];
   
   if(isset($_GET['date'])){
    $sql_emp = "SELECT emp_id , status FROM reserve 
                WHERE date_reserve = '".$_GET['date']."'
                AND emp_id = '".$_SESSION['ses_emp_id']."'
                AND status  IN (1,2) "; 
          mysqli_query($connect,"SET NAMES UTF8");
          $result = mysqli_query($connect,$sql_emp) or die(mysqli_error($connect)); 
          $num = mysqli_num_rows($result) ;
  } 
  
    
    
  $strSQL = " SELECT m.emp_id,m.name_lastname,m.dep_name,r.date_reserve
              FROM reserve r LEFT OUTER JOIN member m 
              ON r.emp_id = m.emp_id
              WHERE r.status  IN (1,2)
             AND r.date_reserve = '$now_date'
             
               ";
       mysqli_query($connect,"SET NAMES UTF8");
       $result = mysqli_query($connect,$strSQL)  or die(mysqli_error($connect));

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/page.css"/>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <title>booking user</title>
 
</head>

  
  <script>
     $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
  <style>
  .fontp {
	color: #FFF;
}
  </style>
 
  <title>booking user</title>
</head>
<body>
 <div>
<!-- ส่วนของการเลือกวันที่เดือนปี  -->

<div align = "center">
          <form name ="form1"  style="width:200px" action="user_page.php" method="GET">
          <h3>Advance Booking</h3>
          <p>
            <input  style="text-align:center" type="text" class = "form-control" id="datepicker" name="date" value="<?=$now_date;?>">
            </p>
          <p>
            <input name="submit" type="submit" class="btn btn-default btn-sm" value="date">
            <br>
            <br>
          </p>
          </form>
   </div> 
  
  <div align ="center">
    <h3></h3>
    <table id ="customers" style="width:70%">
    <thead>
        <tr>
            <th >No.</th>
            <th >Employee ID</th>
            <th >Name - Lastname</th>
            <th >Department</th>
        </tr>
    </thead>
    <?php
    $number = 1;
        while($queryResult = mysqli_fetch_array($result))
        {
    ?>    
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $queryResult["emp_id"]; ?></td>
                <td><?php echo $queryResult["name_lastname"];?></td>
                <td><?php echo $queryResult["dep_name"];?></td>   
            </tr>
    <?php
    $number++;
   
        }
    ?>
 
    </table>
    
    <!-- ***ส่วนของปุ่ม "ยกเลิก" *** -->
    <?php 
      $today = date('Y-m-d') ;
      $time = date('H:i:s') ;
		if($num == 1){	
			if(($now_date >= $today && $time < date('17:00:00')) || $today < $now_date ){
	  
	   
    ?> 
	
         <!-- ปุ่มกดยกเลิก ถามเหตุผล -->
		 <br>
        <button class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#myModal">CANCEL</button>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
      
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!-- ส่วนของป๊อบอัพใส่เหตุผล -->
        <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Please enter a reason</h4>
   
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button> 
                </div>  
                <div class="modal-body">
                  <form   name="form3" action="cancel.php" method="POST">  
                  <input class="form-control" type="text" name="remark"  required="required" >
                  <div class="modal-footer">
                    <input  type="hidden" name="date_cancel" value="<?=$_GET['date'];?>">
                    <button  name = "cancel" type="submit" class="btn btn-primary btn-sm">SAVE</button>                    
                </div>
                </form>
            </div>
        </div>
    </div>
</div>    
    <?php
    
    }  
 }  
    if($today == $now_date || $today <=  $now_date ){
        if($num == 0){
          if($number <= 30){
         
    ?>
		<br>
        <form   name="form2" action="save_reserve.php" method="POST">   
        <input  type="hidden" name="date_reserve" value="<?=$_GET['date'];?>"> 
        <input  name = "reserve" type="submit" class="btn btn-success btn-sm" value="Booking">
        </form>
    <?php
        }
      }
    }

    ?> <script src="js/bootstrap.min.js"></script>
    <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>     
 
</div><div><p align="center" class="fontp">© 2020 Dole Thailand (Doleintl.com). All rights reserved.</p></div>
</body>
</html>

