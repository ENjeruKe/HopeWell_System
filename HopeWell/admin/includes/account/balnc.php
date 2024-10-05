<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="accounts.php"><i class="fa fa-dashboard"></i> <span>Back</span></a></li>
        <li class="header">MANAGE</li>
        
        
     
			<li><a href="doctors_balances.php"><i class="icon-user-md icon-1x"></i>Doctors Balances</a>          </li>
			<li><a href="suppliers_balances.php"><i class="icon-user-md icon-1x"></i>Suppliers Balances</a>                 </li>
			<li><a href="debtors_balances.php"><i class="icon-user-md icon-1x"></i>Debtors Balances</a>                 </li>
			<li><a href="patients_balances.php"><i class="icon-user-md icon-1x"></i>Patients Balances</a>              </li>
                    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>