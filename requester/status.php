<?php include('include/header.php');
 include('dbconnection.php');
 error_reporting(0);
session_start();
if($_SESSION['islogin']){
    $email=$_SESSION['lemail'];
}
else{
    echo "<script> location.href='requesterlodin.php';</script>";
}
?>
   <!-- start 2nd coulumn -->
   <div class="col-sm-6">
   <form action="" method="post" class="form-inline d-print-none">
<div class="form-group mx-3">
    <label for="requestinfo ">Request Id</label>
    <input type="text" class="form-control ml-3" id="requestid"  placeholder="request id" name="rid">
  </div>
  <button class="btn btn-danger" type="submit">Search</button>
</form>
   <?php 
   if(isset($_REQUEST['rid'])){
    $sql="SELECT * FROM assign_work where request_id='".$_REQUEST['rid']."'";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
    if(($row['request_id'] == $_REQUEST['rid'])){
   
   ?>
   <h3 class="text-center mt-2">assign work</h3>
       <table class="table table-bordered">
           <tbody>
               <tr>
               <td>request id</td>
                   <td> <?php  if(isset($row['request_id'])){
                       echo $row['request_id'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request info</td>
                   <td> <?php  if(isset($row['request_info'])){
                       echo $row['request_info'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request description</td>
                   <td> <?php  if(isset($row['request_desc'])){
                       echo $row['request_desc'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>requester name</td>
                   <td> <?php  if(isset($row['request_name'])){
                       echo $row['request_name'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request add</td>
                   <td> <?php  if(isset($row['request_add1'])){
                       echo $row['request_add1'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request city</td>
                   <td> <?php  if(isset($row['request_city'])){
                       echo $row['request_city'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request id</td>
                   <td> <?php  if(isset($row['req_region'])){
                       echo $row['req_region'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>requester postalcode</td>
                   <td> <?php  if(isset($row['req_postalcode'])){
                       echo $row['req_postalcode'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>assign date</td>
                   <td> <?php  if(isset($row['asign_date'])){
                       echo $row['asign_date'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>tecnihian</td>
                   <td> <?php  if(isset($row['tech_name'])){
                       echo $row['tech_name'];
                   }?> </td>
                   
               </tr>
           </tbody>
       </table>
       <div class="text-center">
           <form action="" method="" class="mb-3 d-print-none">
               <input type="submit" class="btn btn-primary"  onClick="window.print();" value="print">
               <input type="submit" class="btn btn-primary" value="Close">
           </form>
       </div>
  <?php } else{
   echo'<div class="alert alert-warning alert-dismissible mt-2 fade show col-sm-6" role="alert">
   <strong>request pending</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
  }} ?>  
</div>

<?php include('include/footer.php');?>