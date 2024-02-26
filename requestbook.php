<?php
include("data.php");
session_start();
$userid=$_GET['userid'];
$bookid=$_GET['bookid'];





$obj=new Data();
$obj->connection();
$obj->requestbook($userid,$bookid);

?>