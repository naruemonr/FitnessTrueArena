
<?php 
 include ('connect.php');
  include ("menu_register.php");
?>
<?php 
  
  $strKeyword = null;
  if(isset($_GET['keyword'])){
 $sql =    "SELECT emp_id,name_lastname, dep_name,tel,email ,status FROM member
                 WHERE status = 0
                 AND    (name_lastname LIKE '%".$_GET["keyword"]."%' or emp_id LIKE '%".$_GET["keyword"]."%'
                                                                    or dep_name LIKE '%".$_GET["keyword"]."%')                                                  
                                                                    ";
                mysqli_query($connect,"SET NAMES UTF8");
                $result = mysqli_query($connect,$sql)  or die(mysqli_error($connect));
  }
?>
<title>member report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <link rel="stylesheet" href="/resources/demos/style.css">


   </div>

 
<h3 align="center">Edit Member</h3>
<div class="container">
<div class="input-group mb-3">
<form name = "form1" method="GET" action="">  
    <input style="width:200px" type="text" class="form-control" placeholder="Search" name="keyword" value="<?php echo $strKeyword;?>">
    <button  type="submit" class="btn"><img src="img/research.png"  height="20" width="20"></button>
    </form>
</div>

<ul class="nav navbar-nav navbar-right"> 
    <form name = "form2" method="GET" action="excel_member.php">  
    <img src="img/ex_r.png" width="30" height="30"  />
    <button name = "date" class="btn" >EXPORT</button>
    </form>
  </ul>

    <table class="table table-striped table-bordered">
      
    <thead>
        <tr>
            <td><div align="center">No.</div></td>
            <td><div align="center">Employee id</div></td>
            <td><div align="center">Name-lastname</div></td>
            <td><div align="center">Department</div></td>
            <td><div align="center">Tel.</div></td>
            <td><div align="center">Email</div></td>
            <td><div align="center">Edit</div></td>
            <td><div align="center">Delete</div></td>                        
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
                <td><?php echo $queryResult["tel"];?></td> 
				<td><?php echo $queryResult["email"];?></td> 
				<td> <form name = "form3" method="POST" action="edit_member_page.php">  
                    <button class="btn btn-primary btn-sm"  name="emp_id" value="<?php echo $queryResult["emp_id"];?>">Edit</button>   
				</td>
				<td> <form name = "form4" method="POST" action="remove_member.php">  
                    <button  class="btn btn-danger btn-sm"  name="emp_id"  onclick="return confirm('Do you want delete this member?')" value="<?php echo $queryResult["emp_id"];?>">Remove</button>   
				</td>

				
                 </tr>
<?php   
  $number++;
       }

?>
       









