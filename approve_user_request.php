<!-- approving the user when the admin clicks the approve button in the User request page of admin dashboard-->
<?php
include("data.php");

$approveuser=$_GET['useridapprove'];

$obj=new Data();
$obj->connection();
$obj->approveuser($approveuser);