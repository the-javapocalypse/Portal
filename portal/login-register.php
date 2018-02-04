<?php

if(isset($_POST['loginBtn'])){
    $email = $_POST['email1'];
    $password = $_POST['password0'];
    $login = new Login();
    $login->loginUser($db, $email, $password);
}


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




<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Fast Alumni Portal</title>
  
    <link rel="stylesheet" href="css/style.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">


    <style type="text/css">
      body
      {
     
        text-align: left;
        background-image: url("pic/fast.jpg");
       	background-size: 100% 150%;
      
      }

      img
      {
        position: static;

      }

  </style>


  
</head>
	</head>
	<body>
		<div class="container">
	    


        <div class="col-sm-8 col-sm-offset-2 main">
        

        <div class="col-sm-6 left-side">
        <h1>FAST Alumni Portal</h1>
        <p>Don't have an account? Create your account, it takes less than a minute.</p>
                	
<div class="form">

        <div class="form-group">
		    <label for="name">Name</label>
            <input type="text" id="name" class="form-control" required placeholder="name">
            
        </div>

        <div class="form-group">
		    <label for="email">Email</label>
            <input type="text" id="email" class="form-control" required placeholder="email">
           
        </div>


        <div class="form-group">
		    <label for="password">Password</label>
            <input type="password" id="Password" class="form-control" required placeholder="password">
           
        </div>


        <div class="form-group">
		    <label for="confirm">Confirm Password</label>
            <input type="password" id="confirm" class="form-control" required placeholder="Confirm password">
           
        </div>

        <div class="text-xs-center">
            <a href="#" target="_blank" class="btn btn-deep-purple">Register</a>
        </div><br><br>


</div>
       	


        </div>
        

		<div class="col-sm-6 right-side">
		<h1>Login</h1>
		
<div class="form">

        <div class="form-group">
		    <label for="email1">Email</label>
            <input type="text" id="email1" class="form-control" required placeholder="email">
            
        </div>

        <div class="form-group">
		    <label for="Password1"><P></P>assword</label>
            <input type="password" id="password1" class="form-control" required placeholder="password">
           
        </div>

        <div class="text-xs-center">
            <a href="#" target="_blank" class="btn btn-deep-purple">Login</a>
        </div><br><br>

        <?php
                        if(isset($_GET['err'])) {

                            ?>

                            <div class="alert-danger">
                                <h4 class="lead">
                                    Wrong Password or Email
                                </h4>
                </div>

                            <?php
                        }
                    ?>



        	<h4 style="color: red; padding: 10px 10px 10px 80px">OR</h4>
		<h4><p>Login with social media</p></h4>
		<button class="fb btn-primary">Login With Facebook</button><br><br>
		<button class="fb btn-danger">Login With Google+</button>

</div>
		</div>
       
        
        </div>
	</body>
</html>
