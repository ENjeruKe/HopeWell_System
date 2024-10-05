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
        
<li><a href="patients_pharmacy.php"><i class="icon-medkit icon-1x"></i>Issue Drugs</a>                                    </li>

        <li><a href="#"><i class="icon-medkit icon-1x"></i>Stock Report</a>                                    </li>
			<li><a href="ip_issuetopatients.php"><i class="icon-group icon-1x"></i>Issue to Patients</a>                                    </li>
			<li><a href="ip_returntopatientsx2.php"><i class="icon-group icon-1x"></i>IP Returns from Patients</a>                                    </li>
			<li><a href="op_returntopatientsx2.php"><i class="icon-group icon-1x"></i>OPD Returns from Patients</a>                                    </li>
			
			<!--li><a href="stocks_grn.php"><i class="icon-bar-chart icon-1x"></i>Receive goods </a>                </li-->

    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>