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


        <li><a href="gl_accounts2.php"><i class="fa fa-line-chart"></i><span>Chart of Accounts</span></a>                                     </li>
        <li><a href="gl_accounts_sub.php"><i class="fa fa-line-chart"></i><span>G/L Accounts sub-groups</span></a>                                     </li>

        <li><a href="post_journal.php"><i class="fa fa-line-chart"></i><span>Journal Vocher</span></a>                                     </li>
        
        <li><a href="trial_balance.php" target ='_blank'><i class="fa fa-line-chart"></i><span>Trial Balance</span></a></li>
			<li><a href="balance_sheet.php" target='_blank'><i class="fa fa-line-chart"></i><span>Balance Sheet</span></a></li>
			<li><a href="profit_loss.php" target ='_blank'><i class="fa fa-line-chart"></i><span>Profit and Loss</span></a></li>
			<li><a href="gl_transactions.php" target ='_blank'><i class="fa fa-line-chart"></i><span>Transaction by A/C</span></a></li>
			<li><a href="gl_transactions_bydate.php" target ='_blank'><i class="fa fa-line-chart"></i><span>All Transaction by date</span></a></li>
                        <li><a href="gl_payments_bydate.php" target ='_blank'><i class="fa fa-line-chart"></i><span>Payment Listing by date</span></a></li>
          
    

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>