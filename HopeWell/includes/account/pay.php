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
        
       <li><a href="post_payment_supplier.php"><i class="icon-list-alt icon-1x"></i>Payment to Suppliers</a>                                     </li>
			<li><a href="post_payment_doctors.php"><i class="icon-list-alt icon-1x"></i>Payment to Doctors</a>                                    </li>
			<li><a href="post_db_receipts.php"><i class="icon-list-alt icon-1x"></i>Payment from Insurrance</a>                                    </li>
			
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>