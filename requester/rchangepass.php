<?php include('include/header.php');
include('dbconnection.php');
session_start();
if($_SESSION['islogin']){
    $email=$_SESSION['lemail'];
}
else{
    echo "<script> location.href='requesterlodin.php';</script>";
}
if(isset($_REQUEST['updte_btn'])){
    if($_REQUEST['rpass']==""){
        $errmsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>all field are required!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
    }else{
       $password=$_REQUEST['rpass'];
        $sql="UPDATE  registration_db SET r_password='$password' where r_email='$email'";
        if($con->query($sql)==true){
            $errmsg='<div class="alert alert-success alert-dismissible " role="alert">
                  <strong>UPDATE SUCCESSFULLY!</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }else{
            $errmsg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>UNABLE TO UPDATE!</strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';
        }
        }
    }

?>

<div class="c0l-sm-9 col-md-10">
<form action="" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="remail" value="<?php echo $email ?>" readonly>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder=" New Password" name="rpass">
  </div>
  
  <button type="submit" class="btn btn-primary" name="updte_btn">update</button>
  <button type="reset" class="btn btn-primary">Reset</button>
</form>
<?php if(isset($errmsg)){
      echo $errmsg;
  }?>
</div>
<?php include('include/footer.php');?>