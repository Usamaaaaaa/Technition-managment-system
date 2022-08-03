<?php include('include/header.php');
include('../requester/dbconnection.php');
if(isset($_REQUEST['login_btn'])) {
    if(($_REQUEST['rname'] == "") || ($_REQUEST['remail'] == "") || ($_REQUEST['rpass'] == "")){
          $errormsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>ALL FIELD ARE REQUIRED!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
       }else{
        $name=$_REQUEST["rname"];
        $email=$_REQUEST['remail'];
        $password=$_REQUEST['rpass'];
       $sql="INSERT INTO registration_db(r_name,r_email,r_password) values('$name','$email','$password')";
     if($con->query($sql)==true){
       $errormsg='<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Registered Successfully!</strong>
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>';}else{
       $errormsg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>unable to register!</strong> 
 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';}}}
    
    
if(isset($_REQUEST['close_btn'])){
    echo "<script> location.href='requester.php';</script>";
  }
    ?>
<!-- viewdetail 2nd col start -->
<div class="col-sm-6 jumbotron  mt-2">
<h3 class="text-center text-uppercase"> add new requester  </h3>
<form action="" method="post">
<div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="rname">
  </div>
  
  <div class="form-group ">
    <label for="requestemail">email</label>
    <input type="email" class="form-control" id="requestemail"  placeholder="email" name="remail">
  </div>
  <div class="form-group ">
    <label for="requesterpass">password</label>
    <input type="password" class="form-control" id="requesterpass"  placeholder="password" name="rpass">
  </div>
  
  
  <button type="submit" class="btn btn-success text-uppercase" name="login_btn">add</button>
  <button type="submit" class="btn btn-dark text-uppercase" name="close_btn">close</button>
  <?php if(isset($errormsg)){
    echo $errormsg;
  }
  $errormsg="";
  ?>
</form>
<?php include('include/footer.php');?>