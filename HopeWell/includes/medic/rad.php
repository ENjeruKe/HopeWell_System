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
        <li class=""><a href="doctors.php"><i class="fa fa-dashboard"></i> <span>Medic Board</span></a></li>
        <li class="header">MANAGE</li>
        
        <li><a href="nutrients.php"><i class="icon-user-md icon-1x"></i>Nutrition Clinic</a>       </li>

        <!--li><a href="wbc.php"><i class="icon-user-md icon-1x"></i>Baby Clinic</a>  </li>             
			<li><a href="wbc.php"><i class="icon-user-md icon-1x"></i>Well Baby Clinics</a>          </li>
			<li><a href="dent.php"><i class="icon-user-md icon-1x"></i>Dental</a>                 </li>
			<li><a href="opt.php"><i class="icon-user-md icon-1x"></i>Optician</a>                 </li>
			<li><a href="surgery.php"><i class="icon-user-md icon-1x"></i>Surgeon</a>              </li>
                <li><a href="nutrients.php"><i class="icon-user-md icon-1x"></i>Nutrition Clinic</a>       </li>
                <li><a href="#"><i class="icon-user-md icon-1x"></i>Special Clinic</a>       </li-->
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>