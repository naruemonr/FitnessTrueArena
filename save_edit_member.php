<?php
ob_start();
session_start();
include ("connect.php");
?>
<?php 

if(isset($_POST['save'])){
     $emp_id = $_POST['emp_id'];
     $name = $_POST['name'];
     $dep_name = $_POST['dep_name'];
     $tel = $_POST['tel'];
     $email = $_POST['email'];


$sql_update = " UPDATE member SET emp_id        = '".$emp_id."' , 
                                  name_lastname = '".$name."',
                                  dep_name      = '".$dep_name."',
                                  tel           = '".$tel."',
                                  email         = '".$email."'
                            WHERE emp_id = '".$emp_id."'
                            AND   status = '0' ";

               mysqli_query($connect,$sql_update) or die(mysqli_error($connect));
               $result_checkin = mysqli_insert_id($connect);

   
  }




header("location:report_member.php?keyword=".$_POST['keyword']);




?>
