<?php session_start(); ?>
<?php include 'header.php'; ?>
<html>
<body background="admin/images/logo.jpg">
<body class="hold-transition login-page">
<div class="login-box">
   	<div class="login-logo">
  		<b>User Login</b>
  	</div>

  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="admin/login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="input Username" required autofocus>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="input Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
  	</div>
 	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<div  align="center">
   <img src="signature_2.gif" alt="img" height="150" width="450">  	</div>

 	
<?php include 'scripts.php' ?>
</body>
</html>