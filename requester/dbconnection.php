<?php
//error_reporting(0);
$username="root";
$host="localhost";
$password="";
$port="3306";
$dbname="ms_db";
$con=new mysqli($host,$username,$password,$dbname,$port);
if($con->connect_error){
    die("connection failed");
}
?>