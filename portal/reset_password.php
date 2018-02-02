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

    <?php include("header.php") ?>

</head>


<?php
$token = "";
if (isset($_GET['token'])) {
    $token = $_GET['token'];
}

if (isset($_POST['resetBtn'])){
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if($pass1 != $pass2){
        echo "<script>location='reset_password.php?err=".urldecode("Passwords Mismatched")."'</script>";
        exit();
    }else{
        $reset = new Register();
        $reset->resetPassword($db, $token, $pass1);
    }

}

?>


<body>

<?php include("navbar.php") ?>

<!-- Page Content -->
<div class="container">
    <div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
        <br/>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Reset Password</h1>
            </div>
            <?php if (isset($_GET['err'])) { ?>
                <div class="alert alert-danger">login Failed: <?php echo $_GET['err'] ?></div>
            <?php } ?>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                        </span>
                            <input id="email" type="password" class="form-control" name="pass1" placeholder="Password"
                                   required=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-lock" style="width: auto"></i>
                        </span>
                            <input id="password" type="password" class="form-control" name="pass2"
                                   placeholder="Confirm Password" required=""/>
                        </div>
                    </div>
                    <input type="submit" id="btnLogin" name="resetBtn" value="Reset" class="btn btn-primary"
                           style="width: 100%">

                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>


<?php include("footer.php");

?>


