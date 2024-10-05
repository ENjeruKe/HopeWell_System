<?php 
include 'open_database.php';
include('includes/connect.php');
    $username =$_SESSION['username'];
	$password=	$_SESSION['password'];
?>
<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Med</b>+</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Medi</b>+</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      
      <?php
      
    
$result = $db->prepare("SELECT * FROM systemfile2 WHERE username = '$username'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
        $we =$row['username'];
        $wq =$row['name'];
        $wp =$row['count'];

    }
 
      
      ?>
    
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!--img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image"-->
              <span class="hidden-xs"><b><?php echo '<font color=green>Current User </font>&nbsp'.$we; ?></b></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src=href="images/logo.jpeg" alt="User Image">

                <p>
                  <?php echo $wq; ?>
                  <small><b>Department </b> <?php echo $aces2; ?></small>
                </p>
              </li>
              <!--li class="user-footer">
                <div class="pull-left">
                  <a href="sign_out.php" class="btn btn-default btn-flat" >Close Shift</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li-->
 
              <li class="user-footer">
                <div class="pull-left">
                  <a href="sign_out.php" class="btn btn-default btn-flat" >Close Shift</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
 
 
 
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>
  
  
  
  	<script>
			jQuery(document).ready(function(){
					$.ajax({
						type: "POST",
						url: "../incoming.php",
						data: ({msg:msg, id:id}),
						success: function(html){
						$.jGrowl("Message Successfully Sent", { header: 'Message Sent' });
						$('#reply'+id).modal('hide');
						}
						
					});
				}); 
			</script>
	
  
  
  <script type="text/javascript">
  $(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));  
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);
  </script>