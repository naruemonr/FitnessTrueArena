  <?php include("connect.php"); ?>
<?php 
session_start();

        if(isset($_POST['Username'])){
				//connection
                  include("connect.php");
				//รับค่า username
                  $Username = $_POST['Username'];
                  
				//query 
                  $sql="SELECT * FROM user u , member m WHERE u.username = '".$Username."' AND u.username = m.emp_id AND m.status = 0 ";

                  $result = mysqli_query($connect,$sql);
				
                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);
					            $_SESSION['ses_username']= $row['username'];
                      $_SESSION['ses_status']= $row['status'];
                      $_SESSION['ses_emp_id']= $row['emp_id'];
					            $_SESSION['ses_name_last']= $row['name_lastname'];

											if ($_SESSION['ses_status']=="0"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
										
                        Header("Location: calendar.php");

                      }

                  }else{
                    echo "<script>";
                        echo "alert(\" user incorrect !!\");"; 
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{


             Header("Location: login.php"); //user  incorrect back to login again

        }
?>



