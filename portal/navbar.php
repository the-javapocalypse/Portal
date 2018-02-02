<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/7/2018
 * Time: 4:22 PM
 */

?>


<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Portal</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=" <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>  "><a
                            href="index.php">Home</a></li>
                <li class=" <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo 'active'; ?>  "><a
                            href="about.php">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><?php if (isset($_SESSION['user_obj'])) {
                        echo $_SESSION['user_obj']->getName();
                    } ?></li>

                <?php if (!isset($_SESSION['user_obj'])){ ?>
                    <li class=" <?php if (basename($_SERVER['PHP_SELF']) == 'register.php') echo 'active'; ?>  "><a
                                href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li class=" <?php if (basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active'; ?>  "><a
                                href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }else{ ?>
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>Welcome <?php echo $_SESSION['user_obj']->getName(); ?></a></li>
                    <li class="active"><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
                <?php }?>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!-- /.container -->
</nav>
