<?php include('include/header.php');
include('../requester/dbconnection.php');

if(isset($_REQUEST['delete'])){
    $sql="DELETE from technition_tb  where emp_id='".$_REQUEST['id']."' ";
    if($con->query($sql)==TRUE){
      echo '<meta http-equiv="refresh" content="0;url=?closed"/>';
  }}
?>
 <!-- 2nd col start --> 
<div class="col-sm-9 col-md-10 mt-2">
  <h3 class="text-center text-uppercase">employee  detail
  <span class="text-lower float-right">
  <a class="btn btn-primary mr-3" href="addemployee.php" ><small>add</small></a>
</span></h3>
<?php 

$sql="SELECT * FROM technition_tb";
$result=$con->query($sql);
if($result->num_rows > 0){

 echo '<table class="table">
        <thead>
          <tr>
            
            <th scope="col">employee id</th>
            <th scope="col">employee name</th>
            <th scope="col">employee city</th>
            
            <th scope="col">employee phone</th>
            <th scope="col">employee email</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>';
            while($row=$result->fetch_assoc()){
       echo '  <tr>';
        echo '<td>'.$row["emp_id"].'</td>';
        echo '<td>'.$row["emp_name"].'</td>';
        echo '<td>'.$row["emp_city"].'</td>';
        echo '<td>'.$row["emp_phone"].'</td>';
        echo '<td>'.$row["emp_email"].'</td>';
        echo '<td>';
        echo '<form action="editemployee.php" class="d-inline">';
        echo '<input type="hidden" name="id" value="'.$row['emp_id'].'">';
        echo' <input type="submit" class="btn btn-primary" name="edit"  value="edit">';
           echo' </form>';
           echo '<form action="" class="d-inline" method="POST">'; 
          echo '<input type="hidden" name="id" value="'.$row['emp_id'].'">';
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



</div>
<?php include('include/footer.php');?>