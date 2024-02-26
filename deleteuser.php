<?php
include("data.php");

$deleteuser=$_GET['useriddelete'];

$obj=new Data();
$obj->connection();
$obj->deleteuserdata($deleteuser);