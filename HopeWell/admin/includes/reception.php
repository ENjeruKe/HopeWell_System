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
        
        <li><a href="patient_register_main.php"><i class="fa fa-calendar"></i> <span>Review</span></a></li>
        
        <li><a href="add_pat.php"><i class="fa fa-file-text"></i><span> New OPD-Patients</span></a></li>

        <li><a href="ip_add_pat.php"><i class="fa fa-file-text"></i><span> New IP-Patients</span></a></li>

        <li><a href="nhif_patients_reg.php"><i class="fa fa-suitcase"></i><span> NHIF </span></a></li>
        
        <li><a href="pendingpe.php"><i class="fa fa-clock-o"></i> <span>Pending Patients</span></a></li>
        
        <li><a href="patients_talley.php"><i class="fa fa-files-o"></i> <span>Total Day Count</span></a></li>
        
        <!--li><a href="patients_appointments.php"><i class="fa fa-files-o"></i> <span>Appointments</span></a></li-->
        <li><a href="add_pat2.php"><i class="fa fa-files-o"></i> <span>Appointments</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>