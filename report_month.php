<!doctype html>
<html lang="en">
<head>

<meta charset="UTF-8">
<title>Report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
 
</head>
<body>
<?php
include ('connect.php');
include ("menu_report.php");


$thai_month_arr=array(
    "0"=>"",
    "1"=>"January",
    "2"=>"February",
    "3"=>"March",
    "4"=>"April",
    "5"=>"May",
    "6"=>"June", 
    "7"=>"July",
    "8"=>"August",
    "9"=>"September",
    "10"=>"October",
    "11"=>"November",
    "12"=>"December"                 
);
?>
<br>
<div align = "center">
<h3>Summary Report</h3><br>
<div style="margin:auto;width:1050px;">
 
  <form method="post" action="">
    Select month
    <select   name="month_check" id="month_check">
    
      <?php 
      for($i=1;$i<=12;$i++){
         ?>
      <option  value="<?=sprintf("%02d",$i)?>" <?=((isset($_POST['month_check']) && $_POST['month_check']==sprintf("%02d",$i)) || (!isset($_POST['month_check']) && date("m")==sprintf("%02d",$i)))?" selected":""?> >
      <?=$thai_month_arr[$i]?>
      </option>
      <?php } ?>
    </select>
    Year
    <select name="year_check" id="year_check">
    <?php
    $data_year=intval(date("Y",strtotime("-2 year")));
    ?>
      <?php for($i=0;$i<=10;$i++){ ?>
        <option   value="<?=$data_year+$i?>" <?=((isset($_POST['year_check']) && $_POST['year_check']==intval($data_year+$i)) || (!isset($_POST['year_check']) && date("Y")==intval($data_year+$i)))?" selected":""?> >
      <?=intval($data_year+$i)?>
      </option>
      <?php } ?>
    </select>
    <input type="submit" name="showData" id="showData" value="select month/year" />
  </form> 



 
<?php
 // ถ้าไม่มีการส่งเดือนและปีมา ให้ใช้เดือนและปีในขณะปัจจุบันนั้น เป้นตัวกำหนด
 if(!isset($_POST['month_check']) && !isset($_POST['year_check'])){
  $date_data_check=date("Y-m-");// จัดรูปแบบปีและเดือนของวันปัจจุบันในรูปแบบ 0000-00-
  $num_month_day=date("t"); // หาจำนวนวันของเดืนอ
  $use_month_check = $date_data_check;    
  $start_date_check = $date_data_check."01"; //ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
  $end_date_check = $date_data_check.$num_month_day; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน

}else{ // ถ้ามีการส่งข้อมูล เดือนและปี มา ให้ใช้เดือนและปี ของค่าที่ส่งมาเป้นตำกำหนด

  $date_data_check = $_POST['year_check']."-".$_POST['month_check']."-";     // จัดรูปแบบปีและเดืนอที่ส่งมาในรูปแบบ 0000-00-
  $num_month_day = date("t",strtotime($_POST['year_check']."-".$_POST['month_check']."-01")); // หาจำนวนวันของเดืนอ
  $use_month_check = $date_data_check;        
  $start_date_check = $date_data_check."01"; //ได้ตัวแปรวันที่เริ่มต้นของเดือนไปใช้งาน
  $end_date_check = $date_data_check.$num_month_day; // ได้ตัวแปรวันที่สิ้นสุดของเดือนไปใช้งาน
 
}
  $strSQL = " SELECT   COUNT(if(r.status in (1,2,3,4),1,NULL)) 'All'
                      ,COUNT(if(r.status = '2',1,NULL)) 'check_in'
                      ,COUNT(if(r.status = '3',1,null)) 'cancel'
                      ,COUNT(if(r.status = '1',1,null)) 'absent'
                      ,r.emp_id ,m.name_lastname,m.dep_name      
                      FROM reserve r LEFT OUTER JOIN member m 
                      ON r.emp_id = m.emp_id
                      WHERE r.date_reserve  BETWEEN '$start_date_check' AND '$end_date_check'   
                      GROUP BY r.emp_id ";

                      mysqli_query($connect,"SET NAMES UTF8");
                      $result = mysqli_query($connect,$strSQL)  or die(mysqli_error($connect));

  ?>

<ul class="nav navbar-nav navbar-right"> 
    <form name = "form2" method="GET" action="excel_month.php">  
    <img src="img/ex_r.png" width="30" height="30" />
    <input type="hidden" name = "start" value = "<?=$start_date_check;?>">
    <input type="hidden" name = "end" value = "<?=$end_date_check;?>">
    <button name = "date_check" class="btn" >EXPORT</button>
    </form>
  </ul>
  <br> <br>


  <div  align ="center">
    <h3></h3>
    <table class="table table-striped table-bordered" style="width: 700" > 
    <thead>
        <tr>
            <th>No.</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Reserve All</th>
            <th>Check-in All</th>
            <th>Cancel All</th>
            <th>Absent All</th>
            
        </tr>
    </thead>
    <?php
    $total_R = 0;
    $total_Ch = 0;
    $total_C = 0;
    $total_A = 0;
    $number_sum = 0;
    $number = 1;
        while($queryResult = mysqli_fetch_array($result))
        {
    ?>    
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $queryResult["emp_id"]; ?></td>
                <td><?php echo $queryResult["name_lastname"];?></td>
                <center><td><?php echo $queryResult["dep_name"];?></td>   
                <center><td><?php echo $queryResult["All"];?></td>
                <center><td><?php echo $queryResult["check_in"];?></td>
                <center><td><?php echo $queryResult["cancel"];?></td>
                <center><td><?php echo $queryResult["absent"];?></td>  
            </tr>
            
    <?php
          $total_R = $total_R + $queryResult["All"];
          $total_Ch = $total_Ch + $queryResult["check_in"];
          $total_C = $total_C + $queryResult["cancel"];
          $total_A = $total_A + $queryResult["absent"];
            $number++;
        }

?>
             <tr>
              <th><?php echo "Toatal"?></th>
              <th><?php  ?></th>
              <th><?php  ?></th>
              <th><?php  ?></th>
              <th><?php echo $total_R ?></th>
              <th><?php echo $total_Ch ?></th>
              <th><?php echo $total_C?></th>
              <th><?php echo $total_A ?></th>
            </tr>
 
</div>
</body>
</html>