<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Fast Alumni Portal</title>

<?php

include("header.php")

?>


    <style type="text/css">
      body
      {
     
        text-align: left;
        background-image: url("img/fast.jpg");
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
		    <label for="form1">Name</label>
            <input type="text" id="form1" class="form-control" required placeholder="name">
            
        </div>

        <div class="form-group">
		    <label for="form2">Email</label>
            <input type="text" id="form2" class="form-control" required placeholder="email">
           
        </div>


        <div class="form-group">
		    <label for="form3">Password</label>
            <input type="password" id="form3" class="form-control" required placeholder="password">
           
        </div>


        <div class="form-group">
		    <label for="form4">Confirm Password</label>
            <input type="password" id="form4" class="form-control" required placeholder="Confirm password">
           
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
		    <label for="form5">Email</label>
            <input type="text" id="form5" class="form-control" required placeholder="email">
            
        </div>

        <div class="form-group">
		    <label for="form6">Password</label>
            <input type="password" id="form6" class="form-control" required placeholder="password">
           
        </div>

        <div class="text-xs-center">
            <a href="#" target="_blank" class="btn btn-deep-purple">Login</a>
        </div><br><br>


        	<h4 style="color: red; padding: 10px 10px 10px 80px">OR</h4>
		<h4><p>Login with social media</p></h4>
		<button class="fb btn-primary">Login With Facebook</button><br><br>
		<button class="fb btn-danger">Login With Google+</button>

</div>
		</div>
       
        
        </div>
	</body>
</html>


<?php

include("footer.php")

?>