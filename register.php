<?php 
include ("connect.php");
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  if(isset($_POST['submit'])){
        $name_lastname = $_POST["name_lastname"];
        $emp_id = $_POST["emp_id"];
        $dep_name = $_POST["dept_name"];
        $tel = $_POST["tel"];
        $email = $_POST["email"]; 

    
       

//เพิ่มเข้าไปในฐานข้อมูล
    	$insert_member = "INSERT member (emp_id,name_lastname,dep_name,tel,email,status)
                          VALUES ('$emp_id','$name_lastname','$dep_name','$tel','$email','0')";
                          mysqli_query($connect,"SET NAMES UTF8");
				      	  $result_member =mysqli_query($connect,$insert_member) or die(mysqli_error($connect));
    
                          $emp_id = $_POST["emp_id"];
    
      
        $insert_user =  "INSERT user (username,emp_id,status,note)
                        VALUES ('$emp_id','$emp_id','0','user')";
                        mysqli_query($connect,"SET NAMES UTF8");
                        $result_user = mysqli_query($connect,$insert_user) or die(mysqli_error($connect));
  
        } 
    
 
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม////////////////////////////////////////////////////////////////////////////////////////////
	
            if($result_member && $result_user){
                echo "<script type='text/javascript'>";
                echo "alert('Register Succesfuly');";
                echo "window.location = 'register_form.php'; ";
                echo "</script>";
            }
            else{
                echo "<script type='text/javascript'>";
                echo "alert('Error back to register again');";
                echo "</script>";
          }
         
    

      
?>