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
       <li class=""><a href="reports.php"><i class="fa fa-dashboard"></i> <span>Back</span></a></li>

        <li class="header">MANAGE</li>
        
       <li><a href='reports.php'><i class='fa fa-bar-chart'></i> <span>Total Users</span></a></li>

<li><a href='patients_talley2.php'><i class='fa fa-bar-chart'></i> <span>Patients Talley</span></a></li>

<li><a href='admissions_date.php'><i class='fa fa-bar-chart'></i> <span>Admissions By date</span></a></li>

<li><a href='beds_list.php'><i class='fa fa-bar-chart'></i> <span>Bed Occupancy</span></a></li>
<li><a href='gre.php'><i class='fa fa-bar-chart'></i> <span>Patients Attendance</span></a></li>
<li><a href='gre2.php'><i class='fa fa-bar-chart'></i> <span>Attendance By Gender</span></a></li>

<!--li><a href='reports.php'><i class='fa fa-bar-chart'></i> <span>Shifts Manager</span></a></li-->
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
