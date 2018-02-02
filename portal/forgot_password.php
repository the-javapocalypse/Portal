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

if(isset($_POST['resetButton'])){
    $email = $_POST['email'];
    $reset = new Register();
    $reset->resetPasswordRequest($db,$email);
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
                <h1>Password Reset</h1>
            </div>
            <?php if(isset($_GET['succ'])) { ?>
                <div class="alert alert-success">Password Reset: <?php echo $_GET['succ'] ?></div>
            <?php } ?>
            <?php if(isset($_GET['err'])) { ?>
                <div class="alert alert-danger">Password Reset: <?php echo $_GET['err'] ?></div>
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
                    <input type="submit" id="resetButton" name="resetButton" value="Reset" class="btn btn-primary" style="width: 100%">

                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>


<?php include("footer.php") ?>

