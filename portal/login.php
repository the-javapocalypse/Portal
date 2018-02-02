<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/7/2018
 * Time: 4:25 PM
 */



?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <title>Login</title>

    <?php include("header.php")?>

</head>


<?php

if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $login = new Login();
    $login->loginUser($db, $email, $password);
}


?>





<body>

<?php include("navbar.php")?>

<!-- Page Content -->
<div class="container">
    <div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Login</h1>
            </div>
            <?php if(isset($_GET['err'])) { ?>
                <div class="alert alert-danger">login Failed: <?php echo $_GET['err'] ?></div>
            <?php } ?>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user" style="width: auto"></i>
                        </span>
                            <input id="email" type="text" class="form-control" name="email" placeholder="Email" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                        </span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required="" />
                        </div>
                    </div>
                    <input type="submit" id="btnLogin" name="loginBtn" value="login" class="btn btn-primary" style="width: 100%">

                    <br><br>
                    <div class="form-group">
                        <a href="forgot_password.php"><h5>Forgot Password?</h5></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>


<?php include("footer.php") ?>

