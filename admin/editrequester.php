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
  echo "<script> location.href='requester.php';</script>";
}
if(isset($_REQUEST['UPDATE_btn'])){
  if($_REQUEST['rid']=="" || $_REQUEST['rname']=="" || $_REQUEST['remail']=="" ){
    $errmsg='<div class="alert alert-warning alert-dismissible fade show col-sm-6" role="alert">
    <strong>all feild required!</strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }else{
  $id=$_REQUEST['rid'];
  $name=$_REQUEST['rname'];
  $email=$_REQUEST['remail'];
  $sql="UPDATE registration_db set r_login_id='$id', r_name='$name',r_email='$email' where r_login_id='$id' ";
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
        $sql="SELECT * FROM registration_db where r_login_id='".$_REQUEST['id']."'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        ?>
        <form action="" method="post">
  <!-- <h5 class="text-center ">Assign work order request</h5> -->
<div class="form-group">
    <label for="requestinfo">Request id</label>
    <input type="text" class="form-control" id="requestinfo"  placeholder="request id" name="rid" 
      value="<?php
       if (isset($row['r_login_id'])) {
         echo $row['r_login_id'];
} 
    ?>" readonly > 
  </div>
  <div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="rname" value="<?php
       if (isset($row['r_name'])) {
         echo $row['r_name'];
} 
    ?>">
  </div>
  
  <div class="form-group ">
    <label for="requestemail">email</label>
    <input type="email" class="form-control" id="requestemail"  placeholder="email" name="remail" value="<?php
       if (isset($row['r_email'])) {
         echo $row['r_email'];
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