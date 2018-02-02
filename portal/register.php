<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/7/2018
 * Time: 4:27 PM
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

    <title>Register</title>

    <?php include("header.php")?>

</head>


<?php

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $password2 = $_POST['confirm'];
    $email = $_POST['email'];

    if($password != $password2){
        echo "<script>location='register.php?err=".urldecode('Passwords Mismatched')."'</script>";
        exit();
    }else{
        $register = new Register();
        $register->registerUser($db, $email, $password, $name);
    }
}



?>



<body>

<?php include("navbar.php")?>



<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Company Name</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" action="#">
                <?php if(isset($_GET['err'])) { ?>
                <div class="alert alert-danger">Registration Failed: <?php echo $_GET['err'] ?></div>
                <?php } ?>

                <?php if(isset($_GET['succ'])) { ?>
                <div class="alert alert-success">Registration Successful: <?php echo $_GET['succ'] ?></div>
                <?php } ?>
                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Your Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include("footer.php") ?>

















