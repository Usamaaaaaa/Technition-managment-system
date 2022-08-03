<?php include('dbconnection.php');
session_start();
if($_SESSION['islogin']){
    $email=$_SESSION['lemail'];
}
else{
    echo "<script> location.href='requesterlodin.php';</script>";
}
$sql="SELECT r_name, r_email from registration_db WHERE r_email='$email'";
$result=$con->query($sql);
if($result->num_rows==1){
$row=$result->fetch_assoc();
$name=$row['r_name'];
// $rname=$row['r_email'];
}
if(isset($_REQUEST['update_btn'])){
 if($_REQUEST['lname']==""){
    $errormsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>ALL FEILD REQUIRED!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}else{
    $name=$_REQUEST['lname'];
    $sql1="UPDATE registration_db SET r_name='$name' where r_email='$email'";
     if($con->query($sql1)==true){
    $errormsg='<div class="alert alert-success alert-dismissible " role="alert">
          <strong>UPDATE SUCCESSFULLY!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}else{
    $errormsg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>UNABLE TO UPDATE!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
       <!--top banner navigation -->
<nav class="navbar navbar-expand-lg text-white bg-danger ">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


</nav>
                <!-- top nav bar end -->
                    <!-- start container -->
                <div class="container-fluid" style="margin-top:30px;">
                    <div class="row">
                        <nav class="col-sm-2 bg-light sidebar py-3">
                            <!-- start sidebar nav> -->
                            <div class=" sidebar-sticky">
                                <ul class="nav flex-column">
                                    <li class="nav-item"><a class="nav-link" href="requesterprofile.php">PROFILE</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" href="submitrequest.php">SUBMIT REQUEST</a></li>
                                  <li class="nav-item"><a class="nav-link" href="status.php">STATUS</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" href="rchangepass.php">CHANGE PASSWORD</a></li>
                                    
                                    <li class="nav-item"><a class="nav-link" href="rlogout.php">LOGOUT</a></li>
                                </ul>
                            </div>
</nav>         
<!-- end sidebar navigation -->
<!-- 2nd colom start -->
<div class="col-sm-6">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lemail" value="<?php echo $_SESSION['lemail'];?>" placeholder="Enter email" readonly>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">name</label>
    <input type="test" class="form-control" id="exampleInputPassword1" placeholder="Password" name="lname" value="<?php echo $name; ?>">

  </div>
  
  <button type="submit" name="update_btn" class="btn btn-primary">update</button>
  <?php if(isset($errormsg)){
      echo $errormsg;
  }?>
</form>
</div>
                    </div>
                </div>
</body>
</html>