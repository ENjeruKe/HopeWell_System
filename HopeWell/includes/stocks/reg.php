<?php
   session_start();
require('open_database.php');
$username = $_SESSION['username'];
?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $username; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="stock_ledger.php"><i class="fa fa-dashboard"></i> <span>Stocks Board</span></a></li>
        <li class="header">MANAGE</li>
        
        
     
			<li><a href="stocks_register.php"><i class="icon-user-md icon-1x"></i>Stocks Register</a>          </li>
			<li><a href="store_locations.php"><i class="icon-user-md icon-1x"></i>Location Register</a>                 </li>
			<li><a href="consumer_dept.php"><i class="icon-user-md icon-1x"></i>Consumer Dept Register</a>                 </li>
			<li><a href="stocks_categ.php"><i class="icon-user-md icon-1x"></i>Stock Category</a>                 </li>
			
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>