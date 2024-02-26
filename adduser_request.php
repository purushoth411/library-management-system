<!-- collecting the data fromcthe user_request(user registration page) and send it to the function userrequest-->
<?php

include("data.php");

$name=$_POST['name'];
$password= $_POST['password'];
$email= $_POST['email'];
$type= $_POST['type'];


$obj=new Data();
$obj->connection();
$obj->userrequest($name,$password,$email,$type);