<?php 
session_start();
include("connect.php");
              $status = '3'; //check-in // ลงเวลาเข้าใช้งาน
              $emp_id = $_POST['emp_id'];
              $date_cancel = $_POST['date_cancel'];
              $remark = $_POST['remark']; 
              

if(isset($_POST['cancel'])){
     
              $sql_cancel = " UPDATE reserve SET status = '".$status."' ,
                                                time_cancel = '".date("Y-m-d H:i:s")."' , 
                                                remark = '".$remark."',
                                                account_cancel = '".$_SESSION['ses_note']."'
                                                WHERE emp_id = '".$emp_id."'
                                                AND date_reserve = '".$date_cancel."'
                                                AND status = '1' ";
                             mysqli_query($connect,"SET NAMES UTF8");
                              mysqli_query($connect,$sql_cancel) or die(mysqli_error($connect));
                              $result_cancel = mysqli_insert_id($connect);

                     
}



header("location:admin_page.php?date=".$_POST['date_cancel']);

?>