<!--dashboard page for user -->

<?php

session_start();

$userloginid=$_SESSION["userid"] = $_GET['userlogid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

    .logo {

        height: 200px;
        margin: auto;
        padding: auto;
        width: 75%;
    }

    .container,
    .row {
        margin: auto;
    }

    .innerdiv {
        text-align: center;
        /* width: 500px; */
        margin: 100px;
    }

    input {
        margin-left: 20px;
    }

    .leftinnerdiv {
        float: left;
        width: 25%;
    }

    .rightinnerdiv {
        float: right;
        width: 75%;
    }

    .innerright {
        background-color: rgb(180, 180, 180);
    }

    .greenbtn {
        background-color: lightgray;
        color: black;
        width: 95%;
        height: 40px;
        margin-top: 8px;
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
    <?php
    include("data.php");
    ?>
    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="logo" src="images/logo.jpg" /></div>
            <div class="leftinnerdiv">
                <button class="greenbtn">WELCOME</button>
                <button class="greenbtn" onclick="openpart('myaccount')">My Account</button>
                <button class="greenbtn" onclick="openpart('requestbook')">Request Book</button>
                <button class="greenbtn" onclick="openpart('bookreport')">Book Report</button>
                <a href="index.php"><button class="greenbtn">Logout</button></a>
            </div>

            <!-- user details -->

            <div class="rightinnerdiv">
                <div id="myaccount" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">My Account</Button>

                    <?php

            $u=new Data;
            $u->connection();
            $u->userdetail($userloginid);
            $recordset=$u->userdetail($userloginid);
            foreach($recordset as $row){

            $id= $row[0];
            $name= $row[1];
            $email= $row[2];
            $pass= $row[3];
            $type= $row[4];
            }               
                ?>

                    <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p>
                    <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p>
                    <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p>

                </div>
            </div>

            <!--request book page-->


            <div class="rightinnerdiv">
                <div id="requestbook" class="innerright portion" style="display:none;">
                    <Button class="greenbtn">Request Book</Button>

                    <?php
            $u=new Data;
            $u->connection();
            $u->getissuebook();
            $recordset=$u->getissuebook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Book Name</th><th>Book Authour</th><th>branch</th><th>price</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td>$row[1]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'><button type='button' class='btn btn-secondary'>Request Book</button></a></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>

                </div>
            </div>

            <!-- book borrowed from the library record-->

            <div class="rightinnerdiv">
                <div id="bookreport" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo "display:none"; }?>">
                    <Button class="greenbtn">BOOK RECORD</Button>

                    <?php

            $userloginid=$_SESSION["userid"] = $_GET['userlogid'];
            $u=new Data;
            $u->connection();
            $u->getbookissue($userloginid);
            $recordset=$u->getbookissue($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td><a href='returnbook.php?returnid=$row[0]&userlogid=$userloginid'><button type='button' class='btn btn-secondary'>Return</button></a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>



        </div>
    </div>

    <script>
        function openpart(portion) {
            var x;
            var i;
            x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
    </script>

</body>

</html>