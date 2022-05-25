<?php
  session_start();
  include ('connect.php');
 $status = 1; //status 1=จอง//



 
//Check num_id สูงสุด เพื่ม No. +1 ในวันที่เลือกและ status'จอง = 1'//

if(isset($_POST['date_reserve'])){
  $sql = " SELECT MAX(no_id) AS maxid FROM reserve 
           WHERE status  IN (1,2) AND date_reserve = '".$_POST['date_reserve']."' ";
          
           $result = mysqli_query($connect, $sql ) or die ( mysqli_error($connect));
           $row = mysqli_fetch_assoc($result) or die(mysqli_error($connect));
 
         $num_id = $row['maxid'];
 }
 
           if($num_id >= 1){
               $num_id = $num_id + 1 ;
           }else{
                  $num_id = 1;
             
           } 

       
    
//บันทึก emp_id ลงตารางจอง //
   
      if(isset($_POST['date_reserve'])){
          $sql_insert = " INSERT INTO reserve (no_id,emp_id,date_reserve,status,time_reserve,account_reserve) 
                         VALUES( '".$num_id."',
                                 '".$_SESSION['ses_emp_id']."',
                                 '".$_POST['date_reserve']."',
                                 '".$status."',
                                 '".date("Y-m-d H:i:s")."',
                                 '".$_SESSION['ses_emp_id']."'
                                 ) ";

          mysqli_query($connect,$sql_insert) or die(mysqli_error($connect));
          $result_reserve = mysqli_insert_id($connect);

              
              }

  header("location:user_page.php?date=".$_POST['date_reserve']);
  
?>