<?php include('include/header.php');
 include('dbconnection.php');
 session_start();
if($_SESSION['islogin']){
    $email=$_SESSION['lemail'];
}
else{
    echo "<script> location.href='requesterlodin.php';</script>";
}
//  insert request data in submitrequest table
if(isset($_REQUEST['submit_btn'])){
  if(($_REQUEST['rinfo'])=="" || ($_REQUEST['rdesc'])=="" ||($_REQUEST['rname'])=="" ||($_REQUEST['raddress1'])=="" ||($_REQUEST['raddress2'])=="" ||($_REQUEST['rcity'])=="" ||($_REQUEST['rregion'])=="" ||($_REQUEST['pcode'])=="" ||($_REQUEST['remail'])=="" ||($_REQUEST['rphone'])=="" ||($_REQUEST['rdate'])=="" ){
   
    $errmsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>all field are required!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
        
  }else{
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
    $date=$_REQUEST['rdate'];
    
    $sql="INSERT INTO submitrequest_tb(r_info,r_description,r_name,r_address1,r_address2,r_city,r_region,r_postalcode,r_email,r_phone,r_date) values ('$info','$desc','$name','$add1','$add2','$city','$region','$code','$email','$phone','$date')";
   
    if($con->query($sql) == TRUE){
      
      $errmsg='<div class="alert alert-success alert-dismissible fade show col-sm-6" role="alert">
         <strong>submit successfuly!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
       
    }else{ 

      $errmsg='<div class="alert alert-danger alert-dismissible fade show col-sm-6" role="alert">
         <strong>unable to submit!</strong> 
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>';
      //  echo $mysqli -> connect_error;
    }
  }
}
if(isset($_REQUEST['view_btn'])){
 echo '<script>location.href="viewrequest.php";</script>';
}




?> 
             <!-- send request form  -->
<div class="col-sm-9 col-md-10 mt-2">
<form action="" method="post">
<div class="form-group">
    <label for="requestinfo">Request Info</label>
    <input type="text" class="form-control" id="requestinfo"  placeholder="request info" name="rinfo">
  </div>
  <div class="form-group">
    <label for="rdescription">Description</label>
    <input type="text" class="form-control" id="rdescription"  placeholder="request description" name="rdesc">
  </div>
  <div class="form-group">
    <label for="requestername">Name</label>
    <input type="text" class="form-control" id="requestername"  placeholder="requestername" name="rname">
  </div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestadd1">Address1</label>
    <input type="text" class="form-control" id="requestadd1"  placeholder="requester address" name="raddress1">
  </div>
  <div class="form-group col-sm-6">
    <label for="requestadd2">Address2</label>
    <input type="text" class="form-control" id="requestadd2"  placeholder="requester address2" name="raddress2">
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestcity">City</label>
    <input type="text" class="form-control" id="requestcity"  placeholder="city name" name="rcity">
 </div>
  <div class="form-group col-sm-4">
    <label for="requestregion">Region</label>
    <input type="text" class="form-control" id="requestregion"  placeholder="province" name="rregion"></div>
  <div class="form-group col-sm-2">
    <label for="postalcode">postal code</label>
    <input type="text" class="form-control" id="postalcode" onkeypress="isinputnum(event)"  name="pcode">
</div>
</div>
  <div class="form-row">
  <div class="form-group col-sm-6">
    <label for="requestemail">email</label>
    <input type="email" class="form-control" id="requestemail"  placeholder="email" name="remail">
  </div>
  <div class="form-group col-sm-2">
    <label for="requestphone">phone</label>
    <input type="text" class="form-control" id="requestphone"  placeholder="phone n0." name="rphone">
  </div>
  <div class="form-group col-sm-2">
    <label for="requestdate">Date</label>
    <input type="date" class="form-control" id="requestdate"   name="rdate">
  </div>
   </div>
  <button type="submit" class="btn btn-success" name="submit_btn">Submit</button>
  <button type="submit" class="btn btn-dark" name="view_btn">View</button>
  
</form>
<?php if(isset($errmsg)){
      echo $errmsg;
  }?>
</div>
        <!-- check input character is sting for postalcade textbox -->
<script>
  function isinputnum(evt) {
  var ch=String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
  }
  }
</script>
<?php include('include/footer.php');?>