<?php 
 include ('connect.php');
 include ("menu_report.php");
?>
<?php 
 

 
  if(isset($_GET['day'])){
    $start = $_GET['start_date'];
	$end = $_GET['end_date'];

  } else {
    $start = date('Y-m-d');
	$end = date('Y-m-d');
	
  }

 $sql_day =    "SELECT r.emp_id,m.name_lastname,m.dep_name,m.tel,m.email,r.date_reserve,
                              r.time_reserve,r.account_reserve,r.time_checkin,r.account_check,r.time_cancel,r.account_cancel,
                               r.remark
                        FROM reserve r LEFT OUTER JOIN member m 
                        ON r.emp_id = m.emp_id
                        WHERE r.date_reserve BETWEEN '$start' AND '$end' ";
                mysqli_query($connect,"SET NAMES UTF8");
                $result = mysqli_query($connect,$sql_day)  or die(mysqli_error($connect));

?>
<title>Daily report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(function() {
    $( "#datepickerStart" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
    <script>
    $(function() {
    $( "#datepickerEnd" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
 <div align = "center">
      <form name="form1"  style="width:400px" action="all_day.php" method="GET">
          <h3>&nbsp;</h3>
          <table width="513" height="198" border="0" align="center">
            <tr>
              <td height="57" colspan="4" align="center"><p style="display: inline;">&nbsp;</p>
                <p style="display: inline;">&nbsp;</p>
                <p style="display: inline;">&nbsp;
                </p>
                <p style="display: inline;">Daily report</p>
                <p style="display: inline;">&nbsp;</p>
                <p style="display: inline;">&nbsp;</p></td>
            </tr>
            <tr>
              <td width="80"><span style="display: inline;">START:</span></td>
              <td width="177"><span style="display: inline;">
                <input style="width:150px" type="text" class = "form-control" id="datepickerStart" name="start_date" value="<?=$start;?>" />
              </span></td>
              <td width="45"><span style="display: inline;">END:</span></td>
              <td width="183"><span style="display: inline;">
                <input style="width:150px" type="text" class = "form-control" id="datepickerEnd" name="end_date" value="<?=$end;?>" />
              </span></td>
            </tr>
            <tr>
              <td colspan="4" align="center"><p>&nbsp;
                </p>
                <p>
                  <input  name = "day" class="btn btn-default btn-sm" type="submit" value = "date" />
              </p></td>
            </tr>
          </table>
        <p>&nbsp;</p>
        </form>
   </div>
   </div>

   <div class="container">
    <div class="btn-toolbar-left" >
      <a href="report_day.php?start_date=<?php echo $start; ?>&end_date=<?php echo $end; ?>">
          <button class="btn">Check-in</button></a>
        <a href="day_cancel.php?start_date=<?php echo $start; ?>&end_date=<?php echo $end; ?>">
          <button class="btn">Cancel</button></a>
		    <a href="day_absent.php?start_date=<?php echo $start; ?>&end_date=<?php echo $end; ?>">
          	<button class="btn">Absent</button></a>
         	  <a href="all_day.php?start_date=<?php echo $start; ?>&end_date=<?php echo $end; ?>">
          		<button class="btn btn-primary">All</button></a>
              </div></div><br>


<div class="container">
<ul class="nav navbar-nav navbar-right"> 
    <form name = "form2" method="GET" action="excel_day.php">  
    <img src="img/ex_r.png" width="30" height="30"  />
        <input type = "hidden" name ="start_date"value = "<?=$start;?>">
	<input type = "hidden" name ="end_date"value = "<?=$end ;?>">
    <button name = "day" class="btn" >EXPORT</button>
    </form>
  </ul>
    <table class="table table-striped table-bordered" style="width:100%">
      
    <thead>
        <tr>
            <th>No.</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Date booking</th>
            <th>time booking</th>
            <th>account booking</th>
            <th>time check in</th>
            <th>account check in</th>
            <th>time cancel</th>
            <th>account cancel</th>
            <th>reason for canceling</th>          
              </tr>
    </thead>
      <tbody>
      <?php
    $number = 1;
                 while($queryResult = mysqli_fetch_array($result)){

    ?>    
            <tr>
                <td><?php echo $number;  ?></td>
                <td><?php echo $queryResult["emp_id"]; ?></td>
                <td><?php echo $queryResult["name_lastname"];?></td>
                <td><?php echo $queryResult["dep_name"];?></td> 
                <td><?php echo $queryResult["date_reserve"];?></td> 
                <td><?php echo $queryResult["time_reserve"];?></td> 
                <td><?php echo $queryResult["account_reserve"];?></td> 
                <td><?php echo $queryResult["time_checkin"];?></td> 
                <td><?php echo $queryResult["account_check"];?></td> 
                <td><?php echo $queryResult["time_cancel"];?></td> 
                <td><?php echo $queryResult["account_cancel"];?></td> 
                <td><?php echo $queryResult["remark"];?></td> 
            </tr>
<?php   
  $number++;
       }

?>
       


