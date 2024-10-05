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
        
        <li><a href="stocks_weekly.php"><i class="icon-list-alt icon-1x"></i>Weekly Report</a>                                     </li>
			<li><a href="stock_movement.php"><i class="icon-list-alt icon-1x"></i>Stock Movement Report</a>                                    </li>
			<li><a href="stock_take_report.php"><i class="icon-list-alt icon-1x"></i>Stock Take Report</a>                                    </li>
			<li><a href="stock_rpt.php"><i class="icon-list-alt icon-1x"></i>Stock Valuation</a>                                    </li>
			<li><a href="stock_adj_rpt.php"><i class="icon-bar-chart icon-1x"></i>Adjustment Rport</a>        </li>
         <li><a href="stock_lowstock_rpt.php"><i class="icon-list-alt icon-1x"></i>Low Stock Report</a>          </li>
        	<li><a href="stock_lpo_rpt.php"><i class="icon-bar-chart icon-1x"></i>List Local Purchase Orders</a>                </li>
        	<li><a href="stocks_inv_rpt.php"><i class="icon-bar-chart icon-1x"></i>Edit Invoice/GRN</a>                </li>
			<li><a href="stock_grn_rpt.php"><i class="icon-bar-chart icon-1x"></i>Goods Received report</a>                </li>
             <li><a href="stocks_grt_rpt.php"><i class="icon-bar-chart icon-1x"></i>Goods Returned report</a>                </li>

    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>