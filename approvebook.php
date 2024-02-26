<<!-- approving the user to take the book when the admin clicks the approve button in the book request page of admin dashboard-->

<?php
include("data.php");

$reqid=$_GET['reqid'];
$bookname=$_GET['book'];
$username=$_GET['user'];
$getdate=date("d/m/Y");
$days=$_GET['days'];

$returndate=Date('d/m/Y',strtotime('+'.$days.'days'));

$obj=new Data();
$obj->connection();
$obj->issuebookapprove($bookname,$username,$days,$getdate,$returndate,$reqid);