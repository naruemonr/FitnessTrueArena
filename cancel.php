<?php
  session_start();
  include ('connect.php');

  $status = '3'; // status 3 คือ ยกเลิกจอง //
  $remark = $_POST['remark']; 



  if(isset($_POST['date_cancel'])){
    $sql_cancel = "  UPDATE reserve SET status = '".$status."' ,
                            remark = '".$remark."',
                            time_cancel ='".date("Y-m-d H:i:s")."' ,
                            account_cancel = '".$_SESSION['ses_emp_id']."'
                    WHERE emp_id = '".$_SESSION['ses_emp_id']."'
                    AND date_reserve = '".$_POST['date_cancel']."'
                    AND status = '1'
                    
                    ";
    mysqli_query($connect,"SET NAMES UTF8");
    mysqli_query($connect, $sql_cancel) or die(mysqli_error($connect));
    $result_cancel = mysqli_insert_id($connect);

        
        }
 



header("location:user_page.php?date=".$_POST['date_cancel']);

  ?>