<?php
session_start();
require('open_database.php');
$location = $_SESSION['company'];
$mdate =$_SESSION['sys_date'];
$username =$_SESSION['username'];
?>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"><b>Medi+</b></a>
        <a class="brand" href="#">Designed by <i>Paltech Systems Consultants</i></a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li><a><i class="icon-user icon-large"></i> Welcome:<strong> <?php echo $_SESSION['username'];?></strong></a></li>
			 <li><a> <i class="icon-calendar icon-large"></i>
								<?php
								//$Today = date('y:m:d',time());
								//$new = date('l, F d, Y', strtotime($Today));
								//echo $new;
								?>

				</a></li>
              <li><a href="../index.php"><font color="red"><i class="icon-off icon-large"></i></font> Log Out</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	
