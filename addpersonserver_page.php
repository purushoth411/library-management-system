<!-- collecting the data fromthe admin_dashboard page(add user)  and send it to the function addnewuser-->
<?php

include("data.php");

$addnames=$_POST['addname'];
$addpass= $_POST['addpass'];
$addemail= $_POST['addemail'];
$type= $_POST['type'];


$obj=new Data();
$obj->connection();
$obj->addnewuser($addnames,$addpass,$addemail,$type);
