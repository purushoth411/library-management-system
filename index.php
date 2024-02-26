<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .corner {
        width: 83%;
        margin-left: 80%;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        height: 625px;

    }
</style>

<body>
    <?php
 $email_msg="";
 $pass_msg="";
 $msg="";

 $ademail_msg="";
 $adpass_msg="";


 if(!empty($_REQUEST['ademail_msg'])){
    $ademail_msg=$_REQUEST['ademail_msg'];
 }

 if(!empty($_REQUEST['adpass_msg'])){
    $adpass_msg=$_REQUEST['adpass_msg'];
 }

 if(!empty($_GET['email_msg'])){
    $email_msg=$_GET['email_msg'];
 }

 if(!empty($_REQUEST['pass_msg'])){
  $pass_msg=$_REQUEST['pass_msg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>

    <div class="container login-container">
        <div class="row">
            <h4><?php echo $msg?></h4>
        </div>
        <div class="row">

            <div class="col-md-6 login-form-3" style="background-color:#32a1e6;">
                <h3>Admin Login</h3>
                <form action="loginadmin.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *" />
                    </div>
                    <Label style="color:red">*<?php echo $ademail_msg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_password" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $adpass_msg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                    <!-- <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div> -->
                </form>
            </div>
            <div class="col-md-6 login-form-1">
                <h3>Student Login</h3>
                <form action="login.php" method="get">
                    <div class="form-group">
                        <input type="text" class="form-control" name="login_email" placeholder="Your Email *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $email_msg?></label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="login_password" placeholder="Your Password *"
                            value="" />
                    </div>
                    <Label style="color:red">*<?php echo $pass_msg?></label>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <div class="form-group">

                        <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                    </div>
                </form>
            </div>



        </div>

    </div>
    <div class="corner">
        <a href="user_request.php"><button type='button' class='btn btn-primary'>User Request</button></a>
    </div>

</body>

</html>