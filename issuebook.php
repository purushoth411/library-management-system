<?php

include("data.php");

$book=$_POST['book'];
$userselect= $_POST['userselect'];
$getdate= date("d/m/Y");
$days= $_POST['days'];

$returnDate=Date('d/m/Y', strtotime('+'.$days.'days'));

$obj=new Data();
$obj->connection();
$obj->issuebook($book,$userselect,$days,$getdate,$returnDate);
