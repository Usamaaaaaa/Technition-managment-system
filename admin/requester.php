<?php include('include/header.php');
include('../requester/dbconnection.php');
// session_start();
// if($_SESSION['adminlogin']){
//     $email=$_SESSION['aemail'];
// }
// else{
//     echo "<script> location.href='adminlogin.php';</script>";
// }
if(isset($_REQUEST['delete'])){
  $sql="DELETE from registration_db  where r_login_id='".$_REQUEST['id']."' ";
  if($con->query($sql)==TRUE){
    echo '<meta http-equiv="refresh" content="0;url=?closed"/>';
}}
?>

<!-- viewdetail 2nd col start -->
<div class="col-sm-9 col-md-10 mt-2">
  <h3 class="text-center text-uppercase">requester  detail
  <span class="text-lower float-right">
  <a class="btn btn-primary mr-3" href="addrequester.php" ><small>add</small></a>
</span></h3>
<?php 

$sql="SELECT * FROM registration_db";
$result=$con->query($sql);
if($result->num_rows > 0){

 echo '<table class="table">
        <thead>
          <tr>
            
            <th scope="col">requester id</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>';
            while($row=$result->fetch_assoc()){
       echo '  <tr>';
        echo '<td>'.$row["r_login_id"].'</td>';
        echo '<td>'.$row["r_name"].'</td>';
        echo '<td>'.$row["r_email"].'</td>';
        echo '<td>';
        echo '<form action="editrequester.php" class="d-inline">';
        echo '<input type="hidden" name="id" value="'.$row['r_login_id'].'">';
        echo' <input type="submit" class="btn btn-primary" name="edit"  value="edit">';
           echo' </form>';
           echo '<form action="" class="d-inline" method="POST">'; 
          echo '<input type="hidden" name="id" value="'.$row['r_login_id'].'">';
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