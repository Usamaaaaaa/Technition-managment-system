<?php
// define('TITLE','work');
include('include/header.php');
include('../requester/dbconnection.php');
// session_start();
// if($_SESSION['adminlogin']){
//     $email=$_SESSION['aemail'];
// }
// else{
//     echo "<script> location.href='adminlogin.php';</script>";
// }
?>
     <!-- viewdetail 2nd col start -->
     <div class="col-sm-9 col-md-10 mt-2">
     <h3 class="text-center mt-2">assign work detail</h3>
     <?php 
     if(isset($_REQUEST['close'])){
     echo' <script>location.href="work.php";</script>';
     }
     if(isset($_REQUEST['view'])){
   if(isset($_REQUEST['id'])){
    $sql="SELECT * FROM assign_work where request_id='".$_REQUEST['id']."'";
    $result=$con->query($sql);
    $row=$result->fetch_assoc();
     ?>
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
            <input type="submit" class="btn btn-primary" name="close" value="close">
        </form>
    </div>
<?php 
}} ?>
     







<?php include('include/footer.php');?>