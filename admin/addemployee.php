<?php include('include/header.php');
include('../requester/dbconnection.php');
if(isset($_REQUEST['login_btn'])) {
    if(($_REQUEST['ename'] == "") || ($_REQUEST['eemail'] == "") 
    || ($_REQUEST['ephone']=="") ||($_REQUEST['ecity']=="")){
          $errormsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>ALL FIELD ARE REQUIRED!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
       }else{
       // $id=$_REQUEST["emp_id"];
        $name=$_REQUEST["ename"];
        $city=$_REQUEST["ecity"];
        $phone=$_REQUEST['ephone'];
        $email=$_REQUEST['eemail'];
        
       $sql="INSERT INTO technition_tb(emp_name,emp_city,emp_phone,emp_email) values('$name','$city','$phone','$email')";
    if($con->query($sql) == TRUE){
        
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
    echo "<script> location.href='employee.php';</script>";
  }
    ?>
<!-- viewdetail 2nd col start -->
<div class="col-sm-6 jumbotron  mt-2">
<h3 class="text-center text-uppercase"> add new employee </h3>
<form action="" method="post">
<div class="form-group">

    <label for="empname">Name</label>
    <input type="text" class="form-control" id="empname"  placeholder="empname" name="ename">
  </div>
  <div class="form-group ">
    <label for="empcity">city</label>
    <input type="text" class="form-control" id="empcity"  placeholder="city" name="ecity">
  </div>
  <div class="form-group ">
    <label for="empphone">phone</label>
    <input type="text" class="form-control" id="empphone"  placeholder="phone no." name="ephone">
  </div>
  
  <div class="form-group ">
    <label for="empemail">email</label>
    <input type="email" class="form-control" id="empemail"  placeholder="email" name="eemail">
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