<?php 
include('include/header.php');
include('../requester/dbconnection.php');
// session_start();
// if(isset($_SESSION['adminlogin'])){
//     $email=$_SESSION['aemail'];
//   }else{
//     echo"<script> location.href='adminlogin.php';</script>";
//   }
  ?>
  <div class="col-sm-4">
       <!-- create rquest card -->
      <?php 
      $sql="SELECT r_id,r_info,r_description,r_date FROM submitrequest_tb ";
      $result=$con->query($sql);
      if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo '<div class="card  mt-1 mx-3">';
            echo'<div class="card-header">';
            echo'Request id:'.$row["r_id"];
            echo'</div>';
            echo'<div class="card-body">';
            echo'<h5 class="card-title">request info:'.$row['r_info'];
              echo'</h5>';
              echo' <p class="card-text">'.$row['r_description'];
              echo'</p>';
              echo' <p class="card-text">'.$row['r_date'];
              echo'</p>';
              echo'<div class="float-right">';
               echo'<form action="" method="POST">';
                echo'<input type="hidden" name="hid"  value='.$row["r_id"].'>';
                echo'<input type="submit" name="view_btn" class="btn btn-danger mr-2 " value="view">';
                echo'<input type="submit" name="close_btn" class="btn btn-danger" value="Close">';
                echo '</form>';
                
                
             echo' </div>';
            echo'</div>';
         echo' </div>';
        }
      }
      ?>
  </div>
  <?php 
  //  show request info in form
  if(isset($_REQUEST['view_btn'])){
  $sql="SELECT * FROM submitrequest_tb where r_id='".$_REQUEST['hid']."'";
  $result=$con->query($sql);
    $row=$result->fetch_assoc();
    }
    // delete assign request from requestpage
  if(isset($_REQUEST['close_btn'])){
    $sql="DELETE  FROM submitrequest_tb where r_id={$_REQUEST['hid']}";
    if($con->query($sql)==TRUE){
       echo '<meta http-equiv="refresh" content="0;url=?closed"/>';
    }
  } 
      // assign request saved in work assign table
  if(isset($_REQUEST['assign_btn'])){
  if(($_REQUEST['rinfo'])=="" || ($_REQUEST['rdesc'])=="" ||($_REQUEST['rname'])=="" ||($_REQUEST['raddress1'])=="" ||($_REQUEST['raddress2'])=="" ||($_REQUEST['rcity'])=="" ||($_REQUEST['rregion'])=="" ||($_REQUEST['pcode'])=="" ||($_REQUEST['remail'])=="" ||($_REQUEST['rphone'])=="" ||  ($_REQUEST['techname'])=="" ||($_REQUEST['rdate'])=="" ){
    $errmsg='<div class="alert alert-warning alert-dismissible fade show col-sm-6" role="alert">
         <small>all field required!</small> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
  }else{
    $rid=$_REQUEST['rid'];
    $info=$_REQUEST['rinfo'];
    $desc=$_REQUEST['rdesc'];
    $name=$_REQUEST['rname'];
    $add1=$_REQUEST['raddress1'];
    $add2=$_REQUEST['raddress2'];
    $city=$_REQUEST['rcity'];
    $region=$_REQUEST['rregion'];
    $code=$_REQUEST['pcode'];
    $email=$_REQUEST['remail'];
    $phone=$_REQUEST['rphone'];
    $tech_name=$_REQUEST['techname'];
    $date=$_REQUEST['rdate'];
    $sql="INSERT INTO assign_work(request_id,request_info,request_desc,request_name,request_add1,request_add2,request_city,req_region,req_postalcode,req_email,req_phone,tech_name,asign_date) values ('$rid','$info','$desc','$name','$add1','$add2','$city','$region','$code','$email','$phone','$tech_name','$date')";
      if($con->query($sql)==TRUE){
      $errmsg='<div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
      <strong>assign successfully!</strong> 
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }}}
  ?>
   <!-- assign work table -->
<div class=" jumbotron col-sm-5 mt-1">
<form action="" method="post">
  <h5 class="text-center ">Assign work order request</h5>
<div class="form-group">
    <label for="requestinfo">Request id</label>
    <input type="text" class="form-control" id="requestinfo"  placeholder="request id" name="rid" 
      value="<?php
       if (isset($row['r_id'])) {
         echo $row['r_id'];
} 
    ?>" readonly> 
  </div>
  <!-- col 3 form start -->
<div class="form-group">
    <label for="requestinfo">Request Info</label>
    <input type="text" class="form-control" id="requestinfo"  placeholder="request info" name="rinfo" value="<?php
       if (isset($row['r_info'])) {
         echo $row['r_info'];
   } 
    ?>">
  </div>
  <div class="form-group">
    <label for="rdescription">Description</label>
    <input type="text" class="form-control" id="rdescription"  placeholder="request description" name="rdesc" value="<?php
       if (isset($row['r_description'])) {
         echo $row['r_description'];
     } 
    ?>">
  </div>
  <div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="rname" value="<?php
       if (isset($row['r_name'])) {
         echo $row['r_name'];
} 
    ?>">
  </div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestadd1">Address1</label>
    <input type="text" class="form-control" id="requestadd1"  placeholder="requester address" name="raddress1" value="<?php
       if (isset($row['r_address1'])) {
         echo $row['r_address1'];
} 
    ?>">
  </div>
  <div class="form-group col-sm-6">
    <label for="requestadd2">Address2</label>
    <input type="text" class="form-control" id="requestadd2"  placeholder="requester address2" name="raddress2" value="<?php
       if (isset($row['r_address2'])) {
         echo $row['r_address2'];
} 
    ?>">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestcity">City</label>
    <input type="text" class="form-control" id="requestcity"  placeholder="city name" name="rcity" value="<?php
       if (isset($row['r_city'])) {
         echo $row['r_city'];
       } 
    ?>">
 </div>
  <div class="form-group col-sm-4">
    <label for="requestregion">Region</label>
    <input type="text" class="form-control" id="requestregion"  placeholder="province" name="rregion" value="<?php
       if (isset($row['r_region'])) {
         echo $row['r_region'];} 
    ?>"></div>
  <div class="form-group col-sm-2">
    <label for="postalcode">postal code</label>
    <input type="text" class="form-control" id="postalcode" onkeypress="isinputnum(event)"  name="pcode" value="<?php
       if (isset($row['r_postalcode'])) {
         echo $row['r_postalcode'];
  } 
    ?>">
</div>
</div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestemail">email</label>
    <input type="email" class="form-control" id="requestemail"  placeholder="email" name="remail" value="<?php
       if (isset($row['r_email'])) {
         echo $row['r_email'];
   } 
    ?>">
  </div>
  <div class="form-group col-sm-6">
    <label for="requestphone">phone</label>
    <input type="text" class="form-control" id="requestphone"  placeholder="phone n0." name="rphone" value="<?php
       if (isset($row['r_phone'])) {
         echo $row['r_phone'];
} 
    ?>">
  </div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="techname">technition</label>
    <input type="text" class="form-control" id="techname"   name="techname">
  </div>
  <div class="form-group col-sm-6">
    <label for="requestdate">Date</label>
    <input type="date" class="form-control" id="requestdate"   name="rdate" value="<?php
       if (isset($row['r_date'])) {
         echo $row['r_date'];
        } 
    ?>">
  </div>
</div>
   </div>
  <button type="submit" class="btn btn-success" name="assign_btn">Assign</button>
  <button type="reset" class="btn btn-dark" name="reset_btn">Reset</button>
  <?php if(isset($errmsg)){
      echo $errmsg;
  }
  $errmsg="";?>
</form> 
<script>
  function isinputnum(evt) {
  var ch=String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
  }
  }
</script>
<?php include('include/footer.php');?>