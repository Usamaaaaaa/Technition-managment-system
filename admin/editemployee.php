<?php include('include/header.php');
include('../requester/dbconnection.php');
// session_start();
// if($_SESSION['adminlogin']){
//     $email=$_SESSION['aemail'];
// }
// else{
//     echo "<script> location.href='adminlogin.php';</script>";
// }

if(isset($_REQUEST['close_btn'])){
  echo "<script> location.href='employee.php';</script>";
}
if(isset($_REQUEST['UPDATE_btn'])){
  if($_REQUEST['eid']=="" || $_REQUEST['ename']=="" || $_REQUEST['eemail']=="" || $_REQUEST['ephone']=="" || $_REQUEST['ecity']==""){
    $errmsg='<div class="alert alert-warning alert-dismissible fade show col-sm-6" role="alert">
    <strong>all feild required!</strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }else{
  $id=$_REQUEST['eid'];
  $name=$_REQUEST['ename'];
  $email=$_REQUEST['eemail'];
  $phone=$_REQUEST['ephone'];
  $city=$_REQUEST['ecity'];
  $sql="UPDATE technition_tb set emp_id='$id', emp_name='$name',emp_city='$city',emp_phone='$phone',emp_email='$email' where emp_id='$id' ";
  if($con->query($sql)==TRUE){
  $errmsg='<div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
    <strong>update successfully!</strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';}
}}
?>
   <div class="col-sm-6 jumbotron mt-2">
   <h3 class="text-center mt-2">update detail</h3>
<?php 
if(isset($_REQUEST['edit'])){
    if(isset($_REQUEST['id'])){
        $sql="SELECT * FROM technition_tb where emp_id='".$_REQUEST['id']."'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        ?>
        <form action="" method="post">
  <!-- <h5 class="text-center ">Assign work order request</h5> -->
<div class="form-group">
    <label for="requestinfo">employee id</label>
    <input type="text" class="form-control" id="requestinfo"  placeholder="request id" name="eid" 
      value="<?php
       if (isset($row['emp_id'])) {
         echo $row['emp_id'];
} 
    ?>" readonly > 
  </div>
  <div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="ename" value="<?php
       if (isset($row['emp_name'])) {
         echo $row['emp_name'];
} 
    ?>">
  </div>
  <div class="form-group">
    <label for="requestername">city</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="ecity" value="<?php
       if (isset($row['emp_city'])) {
         echo $row['emp_city'];
} 
    ?>">
  </div>
  <div class="form-group">
    <label for="requestername">phone</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="ephone" value="<?php
       if (isset($row['emp_phone'])) {
         echo $row['emp_phone'];
} 
    ?>">
  </div>
  
  <div class="form-group ">
    <label for="requestemail">email</label>
    <input type="email" class="form-control" id="requestemail"  placeholder="email" name="eemail" value="<?php
       if (isset($row['emp_email'])) {
         echo $row['emp_email'];
   } 
    ?>">
  </div>
  
  <button type="submit" class="btn btn-success" name="UPDATE_btn">UPDATE</button>
  <button type="submit" class="btn btn-dark" name="close_btn">close</button>
  <?php if(isset($errmsg)){
      echo $errmsg;
  }
  $errmsg="";?>
  </form>
  <?php
}
}

?>
</div>
<?php include('include/footer.php');?>