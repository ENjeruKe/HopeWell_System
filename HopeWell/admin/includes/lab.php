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
        
        <li><a href="patients_lab.php"><i class="icon-search icon-1x"></i>Laboratory</a>                </li>

			<li><a href="patients_radiology.php"><i class="icon-search icon-1x"></i>Radiology</a>  </li>             
			<li><a href="#"><i class="icon-search icon-1x"></i>Theater</a>                                     </li>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>