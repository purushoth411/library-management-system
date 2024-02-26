<!-- collecting the data from the admin_dashboard(addd book) and send it to the function add book-->
<?php

include ("data.php");

$bookname=$_POST['bookname'];
$bookdetail=$_POST['bookdetail'];
$bookauthor=$_POST['bookauthor'];
$bookpub=$_POST['bookpub'];
$branch=$_POST['branch'];
$bookprice=$_POST['bookprice'];
$bookquantity=$_POST['bookquantity'];

$obj=new Data();
$obj->connection();
$obj->addbook($bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity);