<?php
include("data.php");

$id=$_GET['returnid'];

$obj=new Data();
$obj->connection();
$obj->returnbook($id);