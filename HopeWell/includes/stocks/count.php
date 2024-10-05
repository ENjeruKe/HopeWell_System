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
       <li class=""><a href="stock_ledger.php"><i class="fa fa-dashboard"></i> <span>Stocks Board</span></a></li>

        <li class="header">MANAGE</li>
        
        <li><a href="stock_take.php"><i class="icon-list-alt icon-1x"></i>Stock Take</a>                                     </li>
			<li><a href="stock_adjustment2.php"><i class="icon-list-alt icon-1x"></i>Stock Adjustment</a>                                    </li>
			<!--li><a href="profit_loss.php"><i class="icon-list-alt icon-1x"></i>Profit $ Loss</a>                                    </li>
			<li><a href="gl_transactions.php"><i class="icon-bar-chart icon-1x"></i>All Transaction by A/C</a>                </li-->
       
    

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>