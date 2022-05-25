<?php 

session_start();
include ('connect.php');

if(isset($_GET['close'])){
  $start        = $_GET['start_date'];
  $end          = $_GET['end_date'];
  $details      = $_GET['details'];
  $close_status = "4";
  $account_close = $_SESSION['ses_note']; 

// echo $start."<br>";
// echo $end."<br>";
// echo $details."<br>";
// echo $account_close."<br>";

          $sql_insert = " INSERT INTO close (startdate,enddate,status,remark,account) 
                         VALUES( '".$start."',
                                 '".$end."',
                                 '".$close_status."',
                                 '".$details."',
                                 '".$account_close."'
                                 ) ";

          mysqli_query($connect,"SET NAMES UTF8");
          mysqli_query($connect,$sql_insert) or die(mysqli_error($connect));
          $result_reserve = mysqli_insert_id($connect);

          
              
 }

  header("location:close.php");
  
?>