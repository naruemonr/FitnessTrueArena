<?

session_start();

 $_SESSION['ses_status'];
 $_SESSION['ses_emp_id'];
 $_SESSION['ses_name_last'];
 $_SESSION['ses_username'];
 $_SESSION['ses_password'];


if ($_SESSION['ses_username']=="") {
	header("Location:login.php");
	exit();
}

?>