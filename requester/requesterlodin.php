<?php 
include('dbconnection.php');
session_start();
if(!isset($_SESSION['islogin'])){
if(isset($_REQUEST['login_btn'])){
$email=mysqli_real_escape_string($con,trim($_REQUEST['lemail']));
$password=$_REQUEST['lpass'];
$sql="SELECT r_email,r_password FROM registration_db where r_email='$email' and r_password='$password'";
$result=$con->query($sql);
if($result->num_rows>=1){
  $_SESSION['islogin']=true;
  $_SESSION['lemail']=$email;
  echo "<script> location.href='requesterprofile.php';</script>";
  
  exit;}
  else{
    $errormsg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>login failed!</strong> 
    
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
  }
}}else{
  echo "<script> location.href='requesterprofile.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    
    <link rel="stylesheet" href="..css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="mycss.css"> -->
    <!-- font awesome -->
    <link rel="stylesheet" href="..css/all.min.css">
    
    
    <!-- font awesome -->
</head>
<body>
    <div class="mt-5 text-center font-weight-bold "><i class="fas fa-stethoscope fa-2x"></i> <span>ONLINE SERVICE MANAGEMENT SYSTEM</span></div>
    <i class="fas fa-tv "></i>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md4">
                <form action="" class="shadow-lg p-4" method="post">
                
  <div class="form-group">
    <label for="exampleInputEmail1"><i class="fa fa-user"></i>Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="lemail"aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><i class="fa fa-key"></i>Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="lpass"placeholder="Password">
  </div>
  
  <button type="submit" name="login_btn" class="btn btn-primary mt-3 font-weight-bold btn btn-block">Login</button>
  <?php    if(isset($errormsg)){
    echo $errormsg;
  }?>
</form>
          <div class="text-center"><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm text-uppercase">back to home</a></div>      
            </div>
        </div>
    </div>


    <script src="..js/jquery.min.js"></script>
  <script src="..js/popper.min.js"></script>
  <script src="..js/bootstrap.min.js"></script>
  <script src="..js/all.min.js"></script>   
</body>
</html>