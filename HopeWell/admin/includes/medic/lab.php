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
        <li class=""><a href="investigations.php"><i class="fa fa-dashboard"></i> <span>Back</span></a></li>
        <li class="header">MANAGE</li>
       
       <li><a href="lab_st_reg.php"><i class="fa fa-circle icon-1x"></i><span>Lab Stocks Reg</span></a>                 </li>

        <li><a href="patients_lab.php"><i class="fa fa-circle icon-1x"></i><span>Laboratory</span></a>       </li>
        <li><a href="lab_counts.php"><i class="fa fa-circle icon-1x"></i><span>Laboratory summary report</span></a></li>

    <li><a href="lab_stocks_usage.php"><i class="fa fa-circle icon-1x"></i><span>Laboratory Stock usage</span></a></li>

    <li><a href="result_printer.php"><i class="fa fa-circle icon-1x"></i><span>Results</span></a></li>



           
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>