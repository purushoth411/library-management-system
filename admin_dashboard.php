<!--admin dashboard page-->
<?php
include("data.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="">
</head>
<style>
    body {
        background-color: rgb(210, 210, 210);
    }

    .innerright,
    label {
        color: rgb(16, 170, 16);
        font-weight: bold;
    }

    .logo {

        height: 200px;
        margin: auto;
        padding: auto;
        width: 75%;
    }

    .innerdiv {
        text-align: center;

    }

    input {
        margin-left: 20px;
    }

    .leftinnerdiv {
        float: left;
        width: 20%;
    }

    .rightinnerdiv {
        float: right;
        width: 75%;
    }

    .greenbtn,
    a {
        background-color: green;
        color: black;
        width: 95%;
        height: 40px;
        margin-top: 8px;
    }

    th {
        background-color: gainsboro;
        color: black;
    }

    td {
        background-color: gray;
        color: black;
    }

    td,
    a {
        color: black;
    }

    label {
        margin-left: 50px;
        padding-Top: 10px;
        /* display: block;
            text-align: left; */
        font-size: 18px;
        /* font-style:bold;
            padding-bottom: 0px; */
        color: rgb(51, 51, 51);
        /* font-weight: 300;
            margin-bottom: 0rem; */
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=text]:focus,
    input[type=email]:focus,
    input[type=number]:focus,
    input[type=pasword]:focus,

    select:focus,
    textarea:focus {
        outline: none;
    }

    input[type=text],
    input[type=email],
    input[type=number],
    input[type=pasword],
    select,
    textarea {

        width: 40%;
        padding: 2px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-sizing: border-box;
        margin-top: 2px;
        margin-bottom: 2px;
        resize: vertical;
    }




    body {
        font-family: 'Roboto';
        /* background-image: url('images/library.jpg'); */

    }




    ::placeholder {
        color: rgb(189, 184, 184);
        font-style: italic;
        font-size: 14px;
    }

    .innerright {
        background-color: rgb(180, 180, 180);
    }

    .greenbtn,
    a {
        background-color: rgb(90, 90, 90);
        color: black;
        width: 95%;
        height: 40px;
        margin-top: 8px;
    }

    th {
        background-color: gainsboro;
        color: black;
    }

    td {
        background-color: gray;
        color: black;
    }

    td,
    a {
        color: black;
    }
</style>

<body>

    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="logo" src="images/logo.jpg" /></div>
            <div class="leftinnerdiv">
                <button class="greenbtn">Admin</button>
                <button class="greenbtn" onclick="openpart('addbook')">Add Book</button>
                <button class="greenbtn" onclick="openpart('bookreport')">Book Report</button>
                <Button class="greenbtn" onclick="openpart('bookrequest')">Book Request</Button>
                <button class="greenbtn" onclick="openpart('addperson')">Add User</button>
                <button class="greenbtn" onclick="openpart('userrecord')">User Report</button>
                <button class="greenbtn" onclick="openpart('issuebook')">Issue Book</button>
                <button class="greenbtn" onclick="openpart('issuereport')">Issue Report</button>
                <button class="greenbtn" onclick="openpart('userrequest')">User Request</button>
                <a href="index.php"><button class="greenbtn">Logout</button></a>
            </div>

            <!-- add book -->
            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD NEW BOOK</Button>
                    <br>
                    <form action="addbookserver.php" method="post" enctype="multipart/form-data">
                        <label>Book Name:</label><input type="text" name="bookname" />
                        </br>
                        <label>Detail:</label><input type="text" name="bookdetail" /></br>
                        <label>Autor:</label><input type="text" name="bookauthor" /></br>
                        <label>Publication</label><input type="text" name="bookpub" /></br>
                        <div style="color:black;"><label>Branch:</label><input type="radio" name="branch"
                                value="other" />Other<input type="radio" name="branch" value="IT" />IT<div
                                style="margin-left:80px;color:black"><input type="radio" name="branch"
                                    value="MECH" />MECH<input type="radio" name="branch" value="EEE" />EEE</div>
                        </div>
                        <label>Price:</label><input type="number" name="bookprice" /></br>
                        <label>Quantity:</label><input type="number" name="bookquantity" /></br>
                        </br>

                        <button type="submit" class="btn btn-secondary">Submit</button>
                        </br>
                        </br>

                    </form>
                </div>
            </div>


            <!-- add user -->
            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD Person</Button>
                    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data">
                        <label>Name:</label><input type="text" name="addname" />
                        </br>
                        <label>Pasword:</label><input type="pasword" name="addpass" />
                        </br>
                        <label>Email:</label><input type="email" name="addemail" /></br>
                        <label for="typw">Choose type:</label>
                        <select name="type">
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select>
                        </br>

                        <button type="submit" class="btn btn-secondary">Submit</button>
                    </form>
                </div>
            </div>


        </div>
    </div>


    <!-- book report -->

    <div class="rightinnerdiv">
        <div id="bookreport" class="innerright portion" style="display:none">
            <Button class="greenbtn">BOOK RECORD</Button>
            <?php
            $u=new Data;
            $u->connection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td><a href='admin_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-secondary'>View BOOK</button></a></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

        </div>
    </div>



    <!-- book view -->

    <div class="rightinnerdiv">
        <div id="bookdetail" class="innerright portion"
            style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">

            <Button class="greenbtn">BOOK DETAIL</Button>
            </br>
            <?php
            $u=new Data;
            $u->connection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
               $bookname= $row[1];
               $bookdetail= $row[2];
               $bookauthour= $row[3];
               $bookpub= $row[4];
               $branch= $row[5];
               $bookprice= $row[6];
               $bookquantity= $row[7];
               $bookava= $row[8];
               $bookrent= $row[9];

            }            
?>


            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p>
            <p style="color:black"><u>Book Detail:</u> &nbsp&nbsp<?php echo $bookdetail ?></p>
            <p style="color:black"><u>Book Authour:</u> &nbsp&nbsp<?php echo $bookauthour ?></p>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpub ?></p>
            <p style="color:black"><u>Book Branch:</u> &nbsp&nbsp<?php echo $branch ?></p>
            <p style="color:black"><u>Book Price:</u> &nbsp&nbsp<?php echo $bookprice ?></p>
            <p style="color:black"><u>Book Available:</u> &nbsp&nbsp<?php echo $bookava ?></p>
            <p style="color:black"><u>Book Rent:</u> &nbsp&nbsp<?php echo $bookrent ?></p>


        </div>
    </div>





    <!-- user report -->
    <div class="rightinnerdiv">
        <div id="userrecord" class="innerright portion" style="display:none">
            <button class="greenbtn">User RECORD</button>

            <?php
            $u=new Data;
            $u->connection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'><button type='button' class='btn btn-secondary'>Delete</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

        </div>
    </div>


    <!-- issue book -->


    <div class="rightinnerdiv">
        <div id="issuebook" class="innerright portion" style="display:none">
            <Button class="greenbtn">ISSUE BOOK</Button>
            <form action="issuebook.php" method="post" enctype="multipart/form-data">
                <label for="book">Choose Book:</label>

                <select name="book">
                    <?php
            $u=new Data;
            $u->connection();
            $u->issue();
            $recordset=$u->issue();
            foreach($recordset as $row){

                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
        
            }            
            ?>
                </select>
                <br>
                <label for="Select Student">Select Student:</label>
                <select name="userselect">
                    <?php
            $u=new Data;
            $u->connection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
                </select>
                <br>
                <label>Days</label> <input type="number" name="days" />

                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </div>



    <!--issue book record -->

    <div class="rightinnerdiv">
        <div class="innerright portion" id="issuereport" style="display: none;">
            <button class="greenbtn">ISSUE BOOK RECORD</button>
            <?php
    $u=new Data();
    $u->connection();
    $u->issuereport();
    $result=$u->issuereport();
    $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th><th>Issue Type</th></tr>";
    foreach($result as $row){
        $table.="<tr>";
       "<td>$row[0]</td>";
        $table.="<td>$row[2]</td>";
        $table.="<td>$row[3]</td>";
        $table.="<td>$row[6]</td>";
        $table.="<td>$row[7]</td>";
        $table.="<td>$row[8]</td>";
        $table.="<td>$row[4]</td>";
        $table.="</tr>";
    }
    $table.="</table>";
    echo $table;
    ?>
        </div>
    </div>


    <!-- Book request -->
    <div class="rightinnerdiv">
        <div id="bookrequest" class="innerright portion" style="display:none">
            <Button class="greenbtn">BOOK REQUEST</Button>
            <?php
            $u=new Data();
            $u->connection();
            $u->bookrequest();
            $result=$u->bookrequest();
            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>User Name</th><th>user type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($result as $row){
                $table.="<tr>";
                "<td>$row[0]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td><a href='approvebook.php?reqid=$row[0]&book=$row[5]&user=$row[3]&days=$row[6]'><button type='button' class='btn btn-secondary'>Approve</button></a></td>";
                $table.="</tr>";
            }
            $table.="</table>";

            echo $table;
            
            ?>

        </div>
    </div>
    <!-- requested user to register-->

    <div class="rightinnerdiv">
        <div id="userrequest" class="innerright portion" style="display:none">
            <button class="greenbtn">Requested User</button>

            <?php
            $u=new Data;
            $u->connection();
            $u->userrequestdata();
            $recordset=$u->userrequestdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>Action</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='approve_user_request.php?useridapprove=$row[0]'><button type='button' class='btn btn-secondary'>Approve</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

        </div>
    </div>



    <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>



</body>

</html>