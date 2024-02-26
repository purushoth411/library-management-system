<?php
include ("db.php");


class Data extends Db{
    private $email;
    private $name;
    private $password;
    private $bookpic;
    private $bookname;
    private $bookdetail;
    private $bookauthor;
    private $bookpub;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdate;
    private $returnDate;

    // admin login for loginadmin.php 


    function adminlogin($email,$pass){
        $con="SELECT * FROM admin WHERE email='$email' and pass='$pass'";
        $setRecord=$this->connection->query($con);
        $result=$setRecord->rowCount();

        if($result>0){
            foreach($setRecord->fetchall() as $row){
                $login_id=$row['id'];
               // $_SESSION['adminid']=$login_id;
                header("Location:admin_dashboard.php?loginid=$login_id");
            }
        }
        else{
            header("Location:index.php?Invalid");
        }
    }

    // user login for login.php


    function userLogin($t1, $t2) {
        $q="SELECT * FROM userdata where email='$t1' and pass='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['id'];
                header("location:user_dashboard.php?userlogid=$logid"); //this userlogid is passed to user_dashboard.php page
            }
        }

        else {
            header("location:index.php?msg=Invalid Credentials");
        }

    }

    // add new user for addpersonserver_page.php

    function addnewuser($name,$password,$email,$type){
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
        $this->type=$type;


         $conn="INSERT INTO userdata(id, name, email, pass,type)VALUES('','$name','$email','$password','$type')";

        if($this->connection->exec($conn)) {
            header("Location:admin_dashboard.php?msg=New Add done");
        }

        else {
            header("Location:admin_dashboard.php?msg=Register Fail");
        }



    }

    // addbook for addbookserver.php


    function addbook($bookname,$bookdetail,$bookauthor,$bookpub,$branch,$bookprice,$bookquantity){
        $this->bookname=$bookname;
        $this->bookdetail=$bookdetail;
        $this->bookauthor=$bookauthor;
        $this->bookpub=$bookpub;
        $this->branch=$branch;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;

        $q="INSERT INTO book (id,bookname,bookdetail,bookauthor,bookpub,branch,bookprice,bookquantity,bookavail,bookrent) VALUES ('', '$bookname', '$bookdetail', '$bookauthor', '$bookpub', '$branch', '$bookprice', '$bookquantity','$bookquantity',0)";

        if($this->connection->exec($q)){
            header("location:admin_dashboard.php?msg=done");
        }
        else{
            header("location:admin_dashboard.php?msg=fail");
        }

    }

    // userreport for admin_dashboard.php & userselect for issuebook 

    function userdata(){
        $conn="SELECT * FROM userdata";
        $data=$this->connection->query($conn);
        return $data;
    }

    // bookreport for admin_dashboard.php

    function getbook(){
        $conn="SELECT * FROM book";
        $data=$this->connection->query($conn);
        return $data;
    }

    // viewbook in bookreport for admin_dashboard.php

    function getbookdetail($viewid){
        $conn="SELECT * FROM book WHERE id='$viewid'";
        $data=$this->connection->query($conn);
        return $data;
    }

    //bookrequest table for bookrequest in user_dashboard.php

    function getissuebook(){
        $conn="SELECT * FROM book WHERE bookavail !=0";
        $data=$this->connection->query($conn);
        return $data;
    }

    // updating the value of book avail and book rent and add the issue record in issuebook table  for issue.php

    function issuebook($book,$userselect,$days,$getdate,$returnDate){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookavail']-1;
                     $newbookrent=$row['bookrent']+1;
            }

        
            $q="UPDATE book SET bookavail='$newbookava', bookrent='$newbookrent' where id='$bookid'";
            if($this->connection->exec($q)){

            $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine)VALUES('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

            if($this->connection->exec($q)) {
                header("Location:admin_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }

    // issuereport for admin_dashboard.php


    function issuereport(){
        $q="SELECT * FROM issuebook";
        $data=$this->connection->query($q);
        return $data;
    }

    // dlete user data in deleteuser.php in userrecord for admin_dashboard.php

    function deleteuserdata($id){
        $query="DELETE FROM userdata WHERE id='$id'";
        if($this->connection->exec($query)){
            header("Location:admin_dashboard.php?msg=deleted");
        }
        else{
            header("Location:admin_dashboard.php?msg=fail");
        }
    }

    
    //bookrequest record in bookrequest for admin_dashboard.php

    function bookrequest(){
        $q="SELECT * FROM requestbook";
        $data=$this->connection->query($q);
        return $data;
    }

    //approving request in requestbook.php for admin_dashboard.php

    function issuebookapprove($book,$userselect,$days,$getdate,$returnDate,$reqid){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;

        $q="SELECT * FROM book WHERE bookname='$book'";
        $result=$this->connection->query($q);

        $q="SELECT * FROM userdata WHERE name='$userselect'";
        $result1=$this->connection->query($q);
        $recordSet=$result1->rowCount();

        

        if ($recordSet > 0) {

            foreach($result1->fetchAll() as $row) {
                $issueid=$row['id'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($result->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookava=$row['bookavail']-1;
                     $newbookrent=$row['bookrent']+1;
            }

            $q="UPDATE book SET bookavail='$newbookava' , bookrent='$newbookrent' WHERE id='$bookid'";
            if($this->connection->exec($q)){
                $q="INSERT INTO issuebook (userid,issuename,issuebook,issuetype,issuedays,issuedate,issuereturn,fine) VALUES ('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";
                if($this->connection->exec($q)){
                    $q="DELETE FROM requestbook WHERE id='$reqid'";
                    $this->connection->exec($q);
                header("Location:admin_dashboard.php?msg=done");
            }
    
            else {
                header("Location:admin_dashboard.php?msg=fail");
            }
            }
            else{
               header("Location:admin_dashboard.php?msg=fail");
            }




        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }


// Student class  //

//get userdetail of a given id for user_dashboard.php

function userdetail($id){
    $q="SELECT * FROM userdata where id ='$id'";
    $data=$this->connection->query($q);
    return $data;
}


//requst book for requstbook.php for bookrequest in user_dashboard.php 

function requestbook($userid,$bookid){

    $q="SELECT * FROM book where id='$bookid'";
    $recordSetss=$this->connection->query($q);

    $q="SELECT * FROM userdata where id='$userid'";
    $recordSet=$this->connection->query($q);

    foreach($recordSet->fetchAll() as $row) {
        $username=$row['name'];
        $usertype=$row['type'];
    }

    foreach($recordSetss->fetchAll() as $row) {
        $bookname=$row['bookname'];
    }

    if($usertype=="student"){
        $days=7;
    }
    if($usertype=="teacher"){
        $days=21;
    }


    $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

    if($this->connection->exec($q)) {
        header("Location:user_dashboard.php?userlogid=$userid"); //here we can start user_dashboard page with userlogid=$userid
    }

    else {
        header("Location:user_dashboard.php?msg=fail");
    }

}

//bookrecord for how many books the user have issued from library in user_dashboard.php

function getbookissue($userloginid) {

    $newfine="";
    $issuereturn="";

    $q="SELECT * FROM issuebook where userid='$userloginid'";
    $recordSetss=$this->connection->query($q);


    foreach($recordSetss->fetchAll() as $row) {
        $issuereturn=$row['issuereturn'];
        $fine=$row['fine'];
        $newfine= $fine;

        
            //  $newbookrent=$row['bookrent']+1;
    }


    $getdate= date("d/m/Y");
    if($issuereturn<$getdate){
        $q="UPDATE issuebook SET fine='$newfine' where userid='$userloginid'";

        if($this->connection->exec($q)) {
            $q="SELECT * FROM issuebook where userid='$userloginid' ";
            $data=$this->connection->query($q);
            return $data;
        }
        else{
            $q="SELECT * FROM issuebook where userid='$userloginid' ";
            $data=$this->connection->query($q);
            return $data;  
        }

    }
    else{
        $q="SELECT * FROM issuebook where userid='$userloginid'";
        $data=$this->connection->query($q);
        return $data;

    }


}


// bookselect for issue book in admin_dashboard.php


function issue(){
        $q="SELECT * FROM book where bookavail !=0 ";
        $data=$this->connection->query($q);
        return $data;
}

//bookreturning in bookrecord of user_dashboard.php
function returnbook($id){
    $fine="";
    $bookava="";
    $issuebook="";
    $bookrentel="";

    $q="SELECT * FROM issuebook where id='$id'";
    $recordSet=$this->connection->query($q);

    foreach($recordSet->fetchAll() as $row) {
        $userid=$row['userid'];
        $issuebook=$row['issuebook'];
        $fine=$row['fine'];

    }

    $q="SELECT * FROM book where bookname='$issuebook'";
    $recordSet=$this->connection->query($q);   

    foreach($recordSet->fetchAll() as $row) {
        $bookava=$row['bookavail']+1;
        $bookrentel=$row['bookrent']-1;
    }
    $q="UPDATE book SET bookavail='$bookava', bookrent='$bookrentel' where bookname='$issuebook'";
    $this->connection->exec($q);

    $q="DELETE from issuebook where id=$id ";
    if($this->connection->exec($q)){

        header("Location:user_dashboard.php?userlogid=$userid");
     }
    //  else{
    //     header("Location:otheruser_dashboard.php?msg=fail");
    //  }
    // if($fine!=0){
    //     header("Location:otheruser_dashboard.php?userlogid=$userid&msg=fine");
    // }
   

}

//user request to add in the database at adduser_request.php

function userrequest($name,$password,$email,$type){
    $this->name=$name;
    $this->password=$password;
    $this->email=$email;
    $this->type=$type;


     $conn="INSERT INTO userrequest(id, reqname, reqemail, reqpassword,reqtype)VALUES('','$name','$email','$password','$type')";

    if($this->connection->exec($conn)) {
        header("Location:index.php?");
    }

    else {
        header("Location:index.php?msg=RequestFail");
    }
}

//to display requested user in admin_dashboard.php

function userrequestdata(){
    $conn="SELECT * FROM userrequest";
    $data=$this->connection->query($conn);
    return $data;
}

//approving the user from approve_user_request

function approveuser($approveuser){
    $q="SELECT * FROM userrequest WHERE id='$approveuser'";
    $result=$this->connection->query($q);

    foreach($result->fetchAll() as $row) {
        $id=$row['id'];
        $name=$row['reqname'];
        $email=$row['reqemail'];
        $password=$row['reqpassword'];
        $type=$row['reqtype'];
    }

    $q="INSERT INTO userdata (name,email,pass,type) VALUES ('$name','$email','$password','$type')";
    if($this->connection->exec($q)){
        $q="DELETE FROM userrequest WHERE id='$approveuser'";
        if($this->connection->exec($q)){
            header("Location:admin_dashboard.php?msg=done");
        }
        else{
            header("Location:admin_dashboard.php?msg=notdone");
        }
    }else{
        header("Location:admin_dashboard.php?msg=fail");
    }

    


}



}