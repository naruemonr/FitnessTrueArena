<?php
include ('connect.php');

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="booking_day.xls"');#ชื่อไฟล์ 


  if(isset($_GET['day'])){
    $start = $_GET['start_date'];
	$end = $_GET['end_date'];

  } else {
    $start = date('Y-m-d');
	$end = date('Y-m-d');
	
  }

// mysqli_select_db($database_connect, $connect);
$query_BookingLists = "SELECT r.emp_id,
							  m.name_lastname,
							  m.dep_name,
							  m.tel,
							  m.email,
                              r.date_reserve,
							  r.time_reserve,
							  r.account_reserve,
							  r.time_checkin,
							  r.account_check,
							  r.time_cancel,
							  r.account_cancel,
                              r.remark
							  
							 
                      FROM reserve r LEFT OUTER JOIN member m 
                      ON r.emp_id = m.emp_id
                      WHERE r.date_reserve BETWEEN '$start' AND '$end' ";

mysqli_query($connect,"SET NAMES UTF8");
$BookingLists = mysqli_query($connect,$query_BookingLists) or die("Error Qeury [".$BookingLists."]"); 

// $BookingLists = mysqli_query($query_BookingLists, $connect) or die(mysqli_error($connect));
$row_BookingLists = mysqli_fetch_assoc($BookingLists);
$totalRows_BookingLists = mysqli_num_rows($BookingLists);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>excel_reserve</title>
</head>

<body>
<table width="100%" cellspacing="0" cellpadding="0" border="1">
  <tr>
    <td><div align="center">employee id</div></td>
    <td><div align="center">name-lastname</div></td>
    <td><div align="center">department</div></td>
    <td><div align="center">tel</div></td>
    <td><div align="center">email</div></td>
    <td><div align="center">date_booking</div></td>
    <td><div align="center">time_booking</div></td>
    <td><div align="center">account_booking</div></td>
    <td><div align="center">time_checkin</div></td>
    <td><div align="center">account_checkin</div></td>
    <td><div align="center">time_cancel</div></td>
    <td><div align="center">account_cancel</div></td>
    <td><div align="center">reason for canceling</div></td>


  
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_BookingLists['emp_id']; ?></td>
      <td><?php echo $row_BookingLists['name_lastname']; ?> 
      <td><?php echo $row_BookingLists['dep_name']; ?></td>
      <td><?php echo $row_BookingLists['tel']; ?></td>
      <td><?php echo $row_BookingLists['email']; ?></td>
      <td><?php echo $row_BookingLists['date_reserve']; ?></td>
      <td><?php echo $row_BookingLists['time_reserve']; ?></td>
	  <td><?php echo $row_BookingLists['account_reserve']; ?></td>
      <td><?php echo $row_BookingLists['time_checkin']; ?></td>
	  <td><?php echo $row_BookingLists['account_check']; ?></td>
      <td><?php echo $row_BookingLists['time_cancel']; ?></td>
	  <td><?php echo $row_BookingLists['account_cancel']; ?></td>
      <td><?php echo $row_BookingLists['remark']; ?></td>

  
    </tr>
    <?php } while ($row_BookingLists = mysqli_fetch_assoc($BookingLists)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($BookingLists);
?>