<?php  include ("connect.php");
	   include ("menu.php");
?>

<?php 

 error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
session_start();
  
//isset ไม่ใช้เข้าถึง ส่งต่อ ดึง อะไรทั้งสิ้น !! isset คือ **ถ้ามีค่าใน ($_GET['XXXXX']) ในค่า X ** )
  if(isset($_GET['date'])){
    $now_date = $_GET['date'];
  } else {
    $now_date = date('Y-m-d H:i:s');
  }

 $number = 0;
  if(isset($_GET['keyword']) or isset($now_date)){ 
                    //ดึงตาราง reserve แสดงรายชื่อผู้เข้าจองในเเต่ละวัน//
                $strSQL = "SELECT r.reserve_id,m.emp_id,m.name_lastname,m.dep_name,r.date_reserve,r.no_id,r.time_checkin,r.status,m.dep_name
                FROM reserve r LEFT OUTER JOIN member m 
                ON r.emp_id = m.emp_id
                WHERE r.status  IN (1,2)
                AND  r.date_reserve = '$now_date'
                AND (m.name_lastname LIKE '%".$_GET["keyword"]."%' or r.emp_id LIKE '%".$_GET["keyword"]."%' or m.dep_name LIKE '%".$_GET["keyword"]."%')
               
                ";
                    mysqli_query($connect,"SET NAMES UTF8");
                    $result = mysqli_query($connect,$strSQL)  or die(mysqli_error($connect));
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  
    <!--<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />-->
	
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	
  <link rel="stylesheet" href="css/page.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
    $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
<title>booking admin</title>
</head>
<body>
 
    <div align = "center">
          <form name ="form1"  style="width:15%" action="admin_page.php" method="GET">
          <h3>Advance Booking</h3>
          <p>
            <input  style="text-align:center" type="text" class = "form-control" id="datepicker" name="date" value=" <?=$now_date;?> ">
            </p>
          <p>
            <input name="submit" type="submit" class="btn btn-default btn-sm" value="date">
            <br>
            <br>
          </p>
          </form>
   </div> 

  <div align ="center">
    <table width="91%" id ="customers" style="width:80%">
    <thead>
        <tr>
            <th width="5%">No.</th>
            <th width="14%">Employee ID</th>
            <th width="23%">Name</th>
            <th width="33%">Department</th>
            <th width="19%">Check In</th>
            <th width="6%">Cancel</th>
            <!-- <th>Absent</th> -->
        </tr>
    </thead>
    <?php
    $number = 1;
                 while($queryResult = mysqli_fetch_array($result)){     
    ?>    
            <tr>

                <td><?php echo $number;  ?></td>
                <td><?php echo $queryResult["emp_id"]; ?></td>
                <td><?php echo $queryResult["name_lastname"];?></td>
                <td><?php echo $queryResult["dep_name"];?></td> 
        <!-- ส่วนของปุ่ม check-in เข้าใช้งาน -->
				<td><?php 
					  $today = date('Y-m-d') ;
					  $time = date('H:i:s') ;
					  if($today === $now_date ){
						if($queryResult['status'] == "1") { //แสดงปุ่มcheckin status จอง //  
          ?>
          <div align ="center">
						<form name = "form2" method="POST" action="check_in.php">  
						<input  type="hidden" name="date_checkin" value="<?=$_GET['date'];?>"> 
						<button class="btn btn-primary btn-sm"  name="emp_id" value="<?php echo $queryResult["emp_id"];?>">Confirm</button></form>             
					<?php }
					  }
						  if($queryResult['status'] == "2") { //status เข้าไป checkin//
                echo $queryResult["time_checkin"] ;?>&nbsp;&nbsp;
                
                <a href= "edit_checkin.php?emp_id=<?=$queryResult["emp_id"];?>&date_checkin=<?=$_GET['date'];?>" >X</a>
					  <?php	}?> 
					  </td></div>
				<td><div align ="center">
          <?php 
						if($queryResult['status'] == "1") {
							//ให้ปุ่มยกเลิกหายไปหลังเวลา 17.00 ของวันนั้น//
							if($queryResult['date_reserve'] >= $today && $time < date('17:00:00') || $today < $queryResult['date_reserve'] ){ 
						?>
								<!-- ปุ่มกดยกเลิก ถามเหตุผล -->
			  <form name="form3" action ="cancel_page.php" method="POST" >  
									<input  type="hidden" name="date_cancel" value="<?=$_GET['date'];?>"> 
									<button class="btn btn-danger btn-sm"  name="emp_id" value="<?php echo $queryResult["emp_id"];?>">cancel</button>
			  </form> 
							  <?php }
							}
						  if($queryResult['status'] == "2") {
											echo '-';
						   }
					  ?></td>   
          	</tr></div>
  
    <?php                   
     $number++;
          } 
        } 
        
    ?>
  </div>
    </table>
    <br><br>
      <?php
      if($today == $now_date || $today <= $now_date  ){
           if($number <= 30 ){
             
      ?>
  
               <!-- ส่วนของปุ่มจองใส่รหัสพนักงาน สำหรับแอดมิน -->
               <button class="btn btn-success btn-sm"  data-toggle="modal" data-target="#myModal2">BOOKING</button>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
        <div class="modal-center">
        <div class="modal-dialog .modal-align-center " style="width:300px" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Please enter a EmployeeID.</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                  <form name="form3" action="save_reserve_Admin.php" method="POST">  
                      <input class="form-control" type="text" name="emp_id"  placeholder="Employee ID"  required="required" onKeyUp="if(isNaN(this.value)){ alert('Please enter employee id.'); this.value='';}" >
                </div>
                    <div class="modal-footer">
                    <center><button  type ="submit" name = "date_reserve" value="<?=$_GET['date'];?>" class="btn btn-primary btn-sm">SAVE</button>
                    </div>
                  </form>
            </div>
        </div>
    </div>
</div>
<?php
              }
            } 
    ?>


<!-- ปุ่มจอง walk in  -->

<?php
if($today === $now_date ){
           if($number <= 30 ){           
      ?>
            <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#myModal3">WALK-IN</button>
                    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    
                    <div class="modal-center">
                    <div class="modal-dialog .modal-align-center " style="width:300px" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Please enter a employeeID.</h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            </div>
                            <div class="modal-body">
                              <form name="form4" action="save_walkin.php" method="POST">  
                                  <input class="form-control" type="text" name="emp_id"  placeholder="Employee ID"  required="required" onKeyUp="if(isNaN(this.value)){ alert('Please enter employee id.'); this.value='';}" >
                            </div>
                                <div class="modal-footer">
                                  <center><button  type="submit" name = "date_reserve" value="<?=$_GET['date'];?>" class="btn btn-primary btn-sm">SAVE</button>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
              } 
            }
    ?>

</body>
</html>
