<?php
include ("data.php");
$login_email=$_GET['login_email'];
$login_password=$_GET['login_password'];

if($login_email==null || $login_password==null){
    $email_msg="";
    $pass_msg="";
    if($login_email==null){
        $ademail_msg="Email not filled";
    }
    if($login_password==null){
        $adpass_msg="Password not filled";
    }
    header("Location:index.php?ademail_msg=$ademail_msg&adpass_msg=$adpass_msg");
}
elseif($login_email!=null && $login_password!=null){
    $obj=new Data();
    $obj->connection();
    $obj->adminlogin($login_email,$login_password);
}
?>