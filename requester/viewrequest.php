<?php include('include/header.php');
include('dbconnection.php');?>
<?php 

  $sql="SELECT * FROM submitrequest_tb";
  $result=$con->query($sql);
    $row=$result->fetch_assoc();
    ?>
<div class="col-sm-6">

<h3 class="text-center mt-2">your request</h3>
       <table class="table table-bordered">
           <tbody>
               <tr>
               <td>request id</td>
                   <td> <?php  if(isset($row['r_id'])){
                       echo $row['r_id'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request info</td>
                   <td> <?php  if(isset($row['r_info'])){
                       echo $row['r_info'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request description</td>
                   <td> <?php  if(isset($row['r_description'])){
                       echo $row['r_description'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>requester name</td>
                   <td> <?php  if(isset($row['r_name'])){
                       echo $row['r_name'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request add</td>
                   <td> <?php  if(isset($row['r_address1'])){
                       echo $row['r_address1'];
                   }?> </td>
                   
               </tr>
               <tr>
               <td>request city</td>
                   <td> <?php  if(isset($row['r_city'])){
                       echo $row['r_city'];
                   }?> </td>
                   
               </tr>
           </tbody>
       </table>
       <div class="text-center">
           <form action="" method="" class="mb-3 d-print-none">
               <input type="submit" class="btn btn-primary"  onClick="window.print();" value="print">
               <input type="submit" class="btn btn-primary" value="close">
           </form>
       </div>

</div>
<?php include('include/footer.php');?>