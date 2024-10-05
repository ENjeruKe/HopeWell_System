<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left">
        <p><a><i class=" text-success"></i> <?php echo $username; ?></a></p><br>
          
        </div>
        <div class="pull-left info">
          <!--p><?php echo $user['firstname'].' '.$user['lastname']; ?></p-->
          <br><a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
 
        <li><a href="acc.php"><i class="fa fa-calendar"></i> <span>Payments</span></a></li>
        
        <li><a href="opt_balances2.php"><i class="fa fa-calendar"></i> <span>Optical Balances</span></a></li>
        
        <li><a href="save_receipt.php"><i class="fa fa-file-text"></i><span> Reprint Receipts </span></a></li>
        <li><a href="issue_to_patients.php"><i class="fa fa-suitcase"></i><span> In-Patient Billing </span></a></li>
        
        <li><a href="dptc.php"><i class="fa fa-clock-o"></i> <span>Drugs Bought on Cash</span></a></li>
 
        <li><a href="post_banking.php"><i class="fa fa-line-chart"></i><span>Daily Banking</span></a>                                     </li>   
       <li><a href="post_refunds.php"><i class="fa fa-line-chart"></i><span>Refunds</span></a>                                     </li>   
       
        <li><a href="petty_cash.php"><i class="fa fa-files-o"></i> <span>Petty Cash</span></a></li>
        <li><a href="endofday_report2.php" target="_blank"><i class="fa fa-files-o"></i> <span>Daily Collection</span></a></li>
        <li><a href="endofday_report_department.php" target="_blank"><i class="fa fa-files-o"></i> <span>Collection by Department</span></a></li>
      <li><a href="pending_bills.php
      "><i class="fa fa-files-o"></i> <span>Pending Bills</span></a></li>
       <li><a href="postdated_bills.php
      "><i class="fa fa-files-o"></i> <span>Post dated Bills</span></a></li>
      <li><a href="insurance_summary.php" target="_blank"><i class="fa fa-files-o"></i> <span>Insurance Summary</span></a></li>
      
      <li><a href="endofday_report_summary.php" target="_blank"><i class="fa fa-files-o"></i> <span>Collection report summary</span></a></li>
      
 
     <li><a href="acc_test.php"><i class="fa fa-files-o"></i> <span>***Testing for Post Dated***</span></a></li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>