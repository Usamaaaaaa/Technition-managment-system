<?php
include('./requester/dbconnection.php');
//  $errormsg="";
//  if(isset($_REQUEST['login_btn'])) {
//    if(($_REQUEST['lname'] == "") || ($_REQUEST['lemail'] == "") || ($_REQUEST['lpass'] == "")){
//          $errormsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
//          <strong>ALL FIELD ARE REQUIRED!</strong> 
//          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//            <span aria-hidden="true">&times;</span>
//          </button>
//        </div>';
//       }else{
//     $sql="SELECT r_email from registration_db WHERE r_email='".$_REQUEST['lemail']."'";
//          $result=$con->query($sql);
//          if($result->num_rows==1){
//           $errormsg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
//           <strong>email already exist!</strong> 
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">&times;</span>
//           </button>
//         </div>';}
//         $name=$_REQUEST["lname"];
//            $email=$_REQUEST['lemail'];
//            $password=$_REQUEST['lpass'];
//           $sql="INSERT INTO registration_db(r_name,r_email,r_password) values('$name','$email','$password')";
//         if($con->query($sql)==true){
//           $errormsg='<div class="alert alert-success alert-dismissible fade show" role="alert">
//           <strong>Registered Successfully!</strong> 
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//             <span aria-hidden="true">&times;</span>
//           </button>
//         </div>';
// }else
// {
//           $errormsg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
//          <strong>unable to register!</strong> 
    
//          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//            <span aria-hidden="true">&times;</span>
//          </button>
//        </div>';
//        }}}
// ?>
<div class="container pt-5" id="registration">
         <h2 class="text-center text-uppercase">create an account</h2>
         <div class="row mt-4 mb-4">
           <div class="col-md-4 offset-md-3 border border-white">
           <form action="" class="shadow-lg p-4 pl-3 ml-5 signupform " id="rform" method="POST">
           <div class="form-group">
    <label for="fullname" class="pl-2">Name</label>
    <input type="text" class="form-control" id="fname" placeholder="Fullname" name="lname">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="pl-2">Email address</label>
    <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" placeholder="Enter email" name="lemail">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="pl-2">Password</label>
    <input type="password" class="form-control" id="Password1" placeholder="Password" name="lpass">
  </div>
  
  <button type="button" onClick="register()" class="btn btn-primary btn-block text-uppercase" name="login_btn">sign up</button>
  <div id="msg"></div>
  <?php if(isset($errormsg)){
    echo $errormsg;
  }
  $errormsg="";
  ?>
</form>
           </div>
         </div>

        </div> 
    <!-- <script>
function register(e) {
  e.preventDefault();
  console.log("click");
       var nm=document.getElementById("fname");
       var em=document.getElementById("Email1");
       var ps=document.getElementById("Password1");
       
  var xhtp=new xmlhttprequest();
  xhtp.open('POST','insert.php',true);
  xhtp.onload(function(){
    if (this.readyState == 4 && this.status == 200) {
       // Typical action to be performed when the document is ready:
      // document.getElementById("demo").innerHTML = xhttp.responseText;
      console.log(xhtp.responseText);
    }
  });
  const d={name:nm,
  email:em,
  pass:ps

  }
  const mydata=json.stringify(d);
  console.log(mydata);
  xhtp.send();
}
     </script>  -->