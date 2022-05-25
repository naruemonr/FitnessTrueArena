<?php include("menu_calendar.php");

if(isset($_GET['day'])){
$start = $_GET['start_date'];
$end = $_GET['end_date'];

} else {
 $start = date('Y-m-d');
$end = date('Y-m-d');

}
$number = 0;
          $strSQL = "SELECT id,startdate,enddate,remark,account FROM close WHERE status = 4";
          mysqli_query($connect,"SET NAMES UTF8");
          $result = mysqli_query($connect,$strSQL)  or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>close booking</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
      <form name="form1"  style="width:600px" action="insert_close.php" method="GET">
          <h3>&nbsp;</h3>
          <table width="513"  border="0" align="center">
            <tr>
              <td height="57" colspan="4" align="center"><p style="display: inline;">&nbsp;</p>
                <p style="display: inline;">&nbsp;</p>
                <p style="display: inline;">&nbsp;
                </p>
                <h2 style="display: inline;">Close booking</h2>
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
              <td colspan="4" align="center">
                <div class="form-group"><br>
                  <label for="exampleFormControlTextarea1">Details</label>
                  <textarea name = "details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <p><input  name = "close" class="btn btn-primary btn-sm" type="submit" value = "SAVE" /></p>
              </td>
            </tr>
          </table>
        <p>&nbsp;</p>
        </form>
   </div>
   </div>
   <div class="container">
   <div align ="center">
    <table class="table table-striped table-bordered" id ="customers" style="width:80%" >
    <thead>
        <tr>
            <th style="background-color:#DFDFDF;">No.</th>
            <th style="background-color:#DFDFDF;">Start Date</th>
            <th style="background-color:#DFDFDF;">End Date</th>
            <th style="background-color:#DFDFDF;">Details</th>
            <th style="background-color:#DFDFDF;">Account</th>
       
        </tr>
    </thead>
    <?php
    $number = 1;
                 while($queryResult = mysqli_fetch_array($result)){     
    ?>    
            <tr>

                <td><?php echo $number;  ?></td>
                <td><?php echo $queryResult["startdate"]; ?></td>
                <td><?php echo $queryResult["enddate"];?></td>
                <td><?php echo $queryResult["remark"];?></td> 
                <td><?php echo $queryResult["account"];?></td> 
            </tr>
<?php                   
     $number++;
          } 
    
    ?>
    </table>
   </div>
   </div>
</head>
</html>