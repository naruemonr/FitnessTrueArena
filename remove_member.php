<?php
ob_start();
session_start();
?>
<?php 
include ('connect.php');
$status = 1;
$emp_id = $_POST['emp_id'];

if(isset($_POST['emp_id'])){
  $sql_remove = "UPDATE member SET status = '".$status."'   
                              WHERE emp_id = '".$emp_id."' 
                              AND status = '0'
                              ";
            mysqli_query($connect,"SET NAMES UTF8");
            mysqli_query($connect, $sql_remove) or die(mysqli_error($connect));
$result_remove = mysqli_insert_id($connect);
     }
 
 header("location:report_member.php?keyword=".$_POST['keyword']);

?> 