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
        
<li><a href='byd.php'><i class='fa fa-bar-chart'></i> <span>Drugs by Patients</span></a></li>
<li><a href='lab_counts.php'><i class='fa fa-bar-chart'></i> <span>Tests by Patients</span></a></li>
<li><a href='byd2.php'><i class='fa fa-bar-chart'></i> <span>Summ By Drugs</span></a></li>
<li><a href='sbt.php'><i class='fa fa-bar-chart'></i> <span>Summ By Tests</span></a></li>
<li><a href='sbd.php'><i class='fa fa-bar-chart'></i> <span>Summ By Diagnosis</span></a></li>
<li><a href='sbd2.php'><i class='fa fa-bar-chart'></i> <span>Top 10 Diagnosis</span></a></li>
<li><a href='NHIF_patients.php'><i class='fa fa-bar-chart'></i> <span>Patients List</span></a></li>
<li><a href='NHIF_claimform.php'><i class='fa fa-bar-chart'></i> <span>NHIF Claim Form</span></a></li>
<li><a href='patients_talley.php'><i class='fa fa-bar-chart'></i> <span>Patients Tally Sheet</span></a></li>
    
<!--li><a href='reports.php'><i class='fa fa-bar-chart'></i> <span>Admissions By date</span></a></li-->
    
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
