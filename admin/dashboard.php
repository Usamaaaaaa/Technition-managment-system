<?php 
//define('TITLE','dashboard');
include('include/header.php');
include('../requester/dbconnection.php');
session_start();
if(isset($_SESSION['isadminlogin'])){
  $email=$_SESSION['aemail'];
}else{
  echo" <script> location.href='adminlogin.php';</script>";
}

$sql="SELECT COUNT(*) as count FROM submitrequest_tb";
$result=$con->query($sql);
 $row0=$result->fetch_assoc();
 
$sql="SELECT COUNT(*) as totassign FROM assign_work";
$result=$con->query($sql);
 $row1=$result->fetch_assoc();
 
$sql="SELECT COUNT(*) as totaltech FROM technition_tb";
$result=$con->query($sql);
 $row=$result->fetch_assoc();

?>
<!-- start 2nd colomn -->
<div class="col-sm-9 col-md-10">
<div class="row text-center mx-5">
    <div class="col-sm-4 mt-3">
    <div class="card text-white bg-danger mb-3" style="max-width:20rem;">
  <div class="card-header">
    Requests Received
  </div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row0['count'];?></h5>
    
    <a href="request.php" class="btn text-white">view</a>
  </div>
  
</div>
    </div>
    <div class="col-sm-4 mt-3">
    <div class="card text-white bg-success mb-3" style="max-width:20rem;">
  <div class="card-header">
    ASSIGNED WORK
  </div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row1['totassign'];?></h5>
    
    <a href="work.php" class="btn text-white">view</a>
  </div>
  
</div>
    </div>
    <div class="col-sm-4 mt-3">
    <div class="card text-white bg-primary mb-3" style="max-width:20rem;">
  <div class="card-header">
    No.of EMPLOYEE
  </div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['totaltech'];?></h5>
    
    <a href="employee.php" class="btn text-white">view</a>
  </div>
  
</div>
    </div></div>
<!--   card row ended -->
<div class="mx-5 mt-5 text-center">
    <p class="bg-dark text-white p-2">list of requests</p>
    <?php 
    $sql="SELECT *FROM registration_db";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table">
        <thead>
          <tr>
            
            <th scope="col">requester id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
          </tr>
        </thead>
        <tbody>';
            while($row=$result->fetch_assoc()){
       echo '  <tr>';
        echo '<td>'.$row["r_login_id"].'</td>';
        echo '<td>'.$row["r_name"].'</td>';
        echo '<td>'.$row["r_email"].'</td>';
        echo '</tr>';
        }
          
       echo '</tbody>
      </table>';
    }else{
        echo '0 result';

    }
    
    
    
    
    
    
    
    
    ?>
    <?php include('include/footer.php');?>