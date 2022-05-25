<?php 
session_start();
include("connect.php");

$status = '1'; //check-in //


        $emp_id = $_GET['emp_id'];
        $date_checkin = $_GET['date_checkin'];
        $time = "00-00-00 00:00:00";

        echo $emp_id."<br>";
        echo $date_checkin."<br>";

  $sql_update = " UPDATE reserve SET status = '".$status."',
                                    time_checkin = '".$time."',  
                                    account_check = ''      
                                    WHERE emp_id = '".$emp_id."'
                                    AND date_reserve = '".$date_checkin."'
                                    AND status = '2' ";

                  mysqli_query($connect,$sql_update) or die(mysqli_error($connect));
                  $result_checkin = mysqli_insert_id($connect);


header("location:admin_page.php?date=".$_GET['date_checkin']);

?>