<?php 
include('../requester/dbconnection.php');
session_start();
if(!isset($_SESSION['isadminlogin'])){
if(isset($_REQUEST['login_btn'])){
$email=mysqli_real_escape_string($con,trim($_REQUEST['aemail']));
$password=$_REQUEST['apass'];
$sql="SELECT a_email,a_password FROM admin_registration where a_email='$email' and a_password='$password' limit 1";
$result=$con->query($sql);
if($result->num_rows>=1){
  $_SESSION['isadminlogin']=true;
  $_SESSION['aemail']=$email;
  echo "<script> location.href='dashboard.php';</script>";
  
  exit;}
  else{
    $errormsg='<div class="alert alert-danger alert-dismissible  mt-2" role="alert">
         <strong>login failed!</strong> 
    
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
  }
}}else{
  echo "<script> location.href='dashboard.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LOGIN</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    
    <!-- font awesome -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body>
    <div class="mt-5 text-center font-weight-bold "><i class="fa fa-stethoscope fa-2x"></i> <span>ONLINE SERVICE MANAGEMENT SYSTEM</span></div>
    <div>
        <p class="text-center">Admin login</p>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md4">
                <form action="" class="shadow-lg p-4" method="post">
                
  <div class="form-group">
    <label for="exampleInputEmail1"><i class="fa fa-user"></i>Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="aemail"aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1"><i class="fa fa-key"></i>Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="apass"placeholder="Password">
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


<!-- 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>