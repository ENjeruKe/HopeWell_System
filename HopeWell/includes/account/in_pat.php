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
        
        <li><a href="credit_notes.php"><i class="icon-list-alt icon-1x"></i>Post Credit Note</a>                                     </li>
			<li><a href="debit_notes.php"><i class="icon-list-alt icon-1x"></i>Post Debit Note</a>                                    </li>
			<li><a href="nhif_credit.php"><i class="icon-list-alt icon-1x"></i>NHIF Credits</a>                                    </li>
			<li><a href="list_debit_notes.php"><i class="icon-bar-chart icon-1x"></i>List Debit Notes</a>                </li>
         <li><a href="list_credit_notes.php"><i class="icon-list-alt icon-1x"></i>List Credit Notes</a>          </li>
			<!--li><a href="post_inv_supplier.php"><i class="icon-bar-chart icon-1x"></i>List Inv With Diag</a>                </li-->

    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
