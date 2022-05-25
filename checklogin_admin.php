  
<?php 
ob_start();
session_start();

        if(isset($_POST['Username'])){
				//connection
				require_once ("connect.php");
					            
				//รับค่า user & password
                  $Username = $_POST['Username'];
                  $Password = ($_POST['Password']);
						  
				 $sql="SELECT * FROM user Where username='".$Username."' and Password ='".$Password."' ";
 
                  $result = mysqli_query($connect,$sql);
 
                  if(mysqli_num_rows($result)==1){
 
                      $row = mysqli_fetch_array($result);
                      $_SESSION['ses_username']= $row['username'];
                      $_SESSION['ses_status']  = $row['status'];
                      $_SESSION['ses_emp_id']  = $row['emp_id'];
                      $_SESSION['ses_password']= $row['password'];
                      $_SESSION['ses_note']    = $row['note'];
 
                      if ($_SESSION['ses_status']=="1"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
 
                        Header("Location: calendar_admin.php");
 
                      }
 
                    
 
                  }else{
                    echo "<script>";
                        echo "alert(\" user or  password incorrect!!\");"; 
						 echo "window.history.back()";
                        
                    echo "</script>";
 
                  }
 
        }else{


             Header("Location: login.php"); //user  incorrect back to login again

        }
		
				  
	  
				
			
                 
?>