<?php 
include('./requester/dbconnection.php');


$data=stripslashes(file_get_contents('php://input'));
$d=json_decode($data);
$name=$d->name;
$email=$d->email;
$password=$d->pass;
if(($name == "") || ($email == "") || ($password == "")){
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>ALL FIELD ARE REQUIRED!</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';}else{
  if(filter_var($email,FILTER_VALIDATE_EMAIL)){
$sql="INSERT INTO registration_db(r_name,r_email,r_password) values('$name','$email','$password')";

 if($con->query($sql)==true){
  //  echo "ok";
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registered Successfully!</strong> 
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
         </div>';

 }else{
   
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Registered failed!</strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
</div>';
 }}else{
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>invalid email!</strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
</div>';
 }
}



?>