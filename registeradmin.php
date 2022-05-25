<?php 
include ("connect.php");
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  if(isset($_POST['submit'])){
        @$username = $_POST["username"];
        $password = $_POST["password"];
        $empid = $_POST["emp_id"];
        $note = $_POST["note"];
  

//เพิ่มเข้าไปในฐานข้อมูล

      
      $insert_user =  "INSERT user (username,emp_id,status,note,password)
                        VALUES ('$username',' $empid','1','$note','$password')";
                        mysqli_query($connect,"SET NAMES UTF8");
                        $result_user = mysqli_query($connect,$insert_user) or die(mysqli_error($connect));
  
} 
 
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม////////////////////////////////////////////////////////////////////////////////////////////
	
            if($result_user){
                echo "<script type='text/javascript'>";
                echo "alert('Register Succesfuly');";
                echo "window.location = 'register_formadmin.php'; ";
                echo "</script>";
            }
            else{
                echo "<script type='text/javascript'>";
                echo "alert('Error back to register again');";
                echo "</script>";
          }
          
      
?>