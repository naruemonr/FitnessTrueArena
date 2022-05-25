<?php 
    ob_start();//up to server
    session_start();

    if (isset($_POST['username'])) {
        // connection
        // include('server.php');
        require_once ('connect.php');
        // รับค่า User & Password
        $username = $_POST['username'];
        $password = $_POST['password'];
       
        // echo $username;
        // echo $password;
        
            
            $query = "SELECT * FROM user WHERE username = '".$username."' AND Password = '".$password."' ";
            $result = mysqli_query($connect, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result);
                $_SESSION['ses_username']= $row['username'];
                $_SESSION['ses_status']  = $row['status'];
                $_SESSION['ses_emp_id']  = $row['emp_id'];
                $_SESSION['ses_password']= $row['password'];
                $_SESSION['ses_note']    = $row['note'];

                if ($_SESSION['ses_status'] == 'a') {
                    header("Location: calendar.php");
                }
    
                if ($_SESSION['userlevel'] == "0") {
                    header("Location: calendar.php");
                }
            } else {
                echo "<script>alert(Wrong Username or Password)</script>";
            }
        } else {
            header("Location: index.php");
        }
    

?>