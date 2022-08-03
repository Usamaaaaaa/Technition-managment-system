<?php
// define('TITLE','work');
include('include/header.php');
include('../requester/dbconnection.php');
// session_start();
// if($_SESSION['adminlogin']==TRUE){
//     $email=$_SESSION['aemail'];
// }
// else{
//     echo "<script> location.href='adminlogin.php';</script>";
// }
if(isset($_REQUEST['delete'])){
    $sql="DELETE  FROM assign_work where request_id={$_REQUEST['id']}";
    if($con->query($sql)==TRUE){
       echo '<meta http-equiv="refresh" content="0;url=?closed"/>';
    }
}
?>
<div class="col-sm-9 col-md-10 mt-5">
    <?php 
    $sql="Select * From assign_work";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        echo '<table class="table">
        <thead>
          <tr>
            
            <th scope="col">requester id</th>
            <th scope="col">info</th>
            <th scope="col">name</th>
            
            <th scope="col">address</th>
            <th scope="col">city</th>
            <th scope="col">mobile</th>
            
            <th scope="col">technision</th>
            <th scope="col">assign date</th>
            <th scope="col">action</th>
            
          </tr>
        </thead>
        <tbody>';
            while($row=$result->fetch_assoc()){
       echo '  <tr>';
        echo '<td>'.$row["request_id"].'</td>';
        echo '<td>'.$row["request_info"].'</td>';
        echo '<td>'.$row["request_name"].'</td>';
        
        echo '<td>'.$row["request_add1"].'</td>';
        echo '<td>'.$row["request_city"].'</td>';
        echo '<td>'.$row["req_phone"].'</td>';
        
        echo '<td>'.$row["tech_name"].'</td>';
        echo '<td>'.$row["asign_date"].'</td>';
        echo '<td>';
        echo '<form action="workdetail.php" class="d-inline">';
        echo '<input type="hidden" name="id" value="'.$row['request_id'].'">';
        echo' <input type="submit" class="btn btn-primary" name="view"  value="view">';
           echo' </form>';
           echo '<form action="" class="d-inline" method="POST">'; 
           echo '<input type="hidden" name="id" value="'.$row['request_id'].'">';
       echo' <input type="submit" class="btn btn-primary" name="delete" value="delete">';
   echo' </form>';
        
        echo'</td>';
        echo '</tr>';
        }
          
       echo '</tbody>
      </table>';
    }
    
    
    ?>
</div>
<?php include('include/footer.php');?>