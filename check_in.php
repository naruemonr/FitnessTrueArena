<?php 
session_start();
include("connect.php");

$status = '2'; //check-in // ลงเวลาเข้าใช้งาน

if(isset($_POST['date_checkin'])){
     if(isset($_POST['emp_id'])){

        $emp_id = $_POST['emp_id'];
        $date_check = $_POST['date_checkin'];


  $sql_update = " UPDATE reserve SET time_checkin = '".date("Y-m-d H:i:s")."' , 
                                    status = '".$status."',
                                    account_check = '".$_SESSION['ses_note']."'
                                    WHERE emp_id = '".$emp_id."'
                                    AND date_reserve = '".$date_check."'
                                    AND status = '1' ";

                  mysqli_query($connect,$sql_update) or die(mysqli_error($connect));
                  $result_checkin = mysqli_insert_id($connect);

      
      }

  
}


header("location:admin_page.php?date=".$_POST['date_checkin']);

?>