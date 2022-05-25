<?php
  include ("menu_user.php");
?>
<!doctype html>
<html lang="en">
<head>

  <style type="text/css">
<!--
.style1 {
font-size: 24px;
font-weight: bold;
}
.fontp {
color: #FFF;
}
-->
  </style>
</head>
<body>
   
<?php


// เวลาไทม์โซน
date_default_timezone_set('Asia/Tokyo');

// Get prev & next month
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // This month
    $ym = date('Y-m');
}

//////////เพิ่มมา GET date ////
if(isset($_GET['date'])){
  $now_date = $_GET['date'];
} else {
  $now_date = date('Y-m-d');
}


// Check format
$timestamp = strtotime($ym . '-01');  // the first day of the month
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}

// Today
$today = date('Y-m-j');

// Title
$title = date('F, Y', $timestamp); //เดือน

// Create prev & next month link
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$next = date('Y-m', strtotime('+1 month', $timestamp));

// Number of days in the month
$day_count = date('t', $timestamp);

// 1:Mon 2:Tue 3: Wed ... 7:Sun
$str = date('N', $timestamp);

// Array for calendar
$weeks[] = '<tr>';
$week = '';

// Add empty cell(s)
$week .= str_repeat('<td></td>', $str - 1);



for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $ym . '-' . sprintf('%02s',$day);
    //$date = date_format($date,'Y-m-d');

    ///////////////////จำนวนตัวเลขในปุ่มกับสี/////////////////////////////
    $count = "SELECT COUNT(no_id)  FROM reserve WHERE status  IN (1,2) AND date_reserve = '$date' ";
              $result = mysqli_query($connect, $count ) or die ( mysqli_error($connect));
              $row = mysqli_fetch_assoc($result) or die(mysqli_error($connect));

             $show =  $row['COUNT(no_id)'];
             
     $close = "SELECT* FROM close WHERE status = '4' ";
 $result_c = mysqli_query($connect, $close ) or die ( mysqli_error($connect));
              $check = mysqli_fetch_assoc($result_c) or die(mysqli_error($connect));
 
            $start = $check['startdate'];
            $end   = $check['enddate'];
            $status   = $check['status'];
            $off   = "off";
/////////////////////////////////////////////////////////////////////////////////////
    if ($today == $date) {
        $week .= '<td class="today">';
    } else {
        $week .= '<td >';
     }
       
if($date >= $start && $date <= $end  && $status == '4' ){
$week .= $day . '<br><center>
                          <form
                          ฃ name = "date" method="" action="">
                          <button name="date" value="'. $date.'" class="btn btn-defaut btn-circle btn-sm">
                          <i>'.$off.'</i>
                          </button></a>
                </td>';
} elseif($show >= '30'){
       $week .= $day . '<br><center>
                          <form name = "date" method="GET" action="user_page.php">
                          <button name="date" value="'. $date.'" class="btn btn-danger btn-circle btn-sm">
                          <i>'.$show.'</i>
                          </button></a>
                </td>';
     } elseif($show >= '20') {
        $week .= $day .'<br><center>
                      <form name = "date" method="GET" action="user_page.php">
                           <button name="date" value="'.$date.'" class="btn btn-warning btn-circle btn-sm">
                           <i>'.$show.'</i>
                           </button></a>
                </td>';
} elseif($show >= '1') {
        $week .= $day .'<br><center>
                         <form name = "date" method="GET" action="user_page.php">
                         <button name="date" value="'.$date.'" class="btn btn-success btn-circle btn-sm">
                         <i>'.$show.'</i>
                         </button></a>
                </td>';
      }else {
        $week .= $day .'<br><center>
                         <form name = "date" method="GET" action="user_page.php">
                         <button name="date" value="'.$date.'" class="btn btn-info btn-circle btn-sm">
                         <i>'.$show.'</i>
                         </button></a>
                </td>';

    }
   
       
    // Sunday OR last day of the month
    if ($str % 7 == 0 || $day == $day_count) {

        // last day of the month
        if ($day == $day_count && $str % 7 != 0) {
            // Add empty cell(s)
            $week .= str_repeat('<td></td>', 7 - $str % 7);
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>True Arena  booking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

    <style>
        .container {
            font-family: 'Montserrat', sans-serif;
            margin: 5px auto;
        }
        .list-inline {
            text-align: center;
            margin-bottom: 30px;
        }
        .title {
            font-weight: bold;
            font-size: 20px;
        }
        th {
            text-align: center;
        }
        td {
            height: 90px;
            width: 90px;
        }
        th:nth-of-type(6), td:nth-of-type(6) {
            color: blue;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: red;
        }
        .today {
            background-color: #cbe9f2;
        }
        .btn-circle.btn-sm {
            width: 40px;
            height: 40px;
            padding: 10px 5px 5px 3px;
            font-size: 22px;
            line-height: 1.33;
            border-radius: 25px;
        }
        body {
            background-image: url('img/OE7GBE0.jpg');
            background-size: 100%;
            background-position: center;
            height: 100%;
            background-size: cover;
            filter: alpha(opacity=96);
            background-size: 100%  ;
            background-repeat: repeat-x;

        }
#rcorners {
  margin: auto;
  border-radius: 25px;
  background: #FFFFFF ;
  padding: 5px;
  width: 350px;
  height: 45px;
}
#today {
 background-color: #ffffff;
 color: black;
 border-radius: 25px;
 padding: 15px 25px;
 text-align: center;
 text-decoration: none;
 display: inline-block;
}




    </style>
</head>
<body>

    <div class="container">
<div id="rcorners">
<ul class="list-inline style1">
<li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; prev</a></li>
<li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
<li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-link">next &gt;</a></li>
</ul>
</div>

        <p class="text-right"><a href="calendar.php"  id="today" >Today</a></p>


      <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="background-color:powderblue;">Mon </th>
                    <th style="background-color:powderblue;">Tue</th>
                    <th style="background-color:powderblue;">Wed</th>
                    <th style="background-color:powderblue;">Thu</th>
                    <th style="background-color:powderblue;">Fri</th>
                    <th style="background-color:powderblue;">Sat</th>
                    <th style="background-color:powderblue;">Sun</th>
                </tr>
            </thead>
            <tbody style="background-color:#FFFFFF ;">
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                       
                    }
                   
                ?>
             
            </tbody>
      </table>
        <p align="center" class="fontp">© 2020 Dole Thailand (Doleintl.com). All rights reserved.</p>
    </div>
   
   
</body>

</html> 
