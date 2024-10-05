<?php
session_start();
 require('open_database.php');
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <!--div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div-->
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="doctors.php"><i class="fa fa-dashboard"></i> <span>Back</span></a></li>
        <li class="header">MANAGE</li>
        
        <li><a href="patients_doctor_c.php"><i class="icon-user-md icon-1x"></i>Out Patient</a>  </li>             
          <li><a href="in_patients_doctor_c.php"><i class="icon-user-md icon-1x"></i>In Patient</a>  </li>             
			<li><a href="completed.php"><i class="icon-user-md icon-1x"></i>Completed Patients</a>          </li>
			<!--li><a href="dent.php"><i class="icon-user-md icon-1x"></i>Dental</a>                 </li>
			<li><a href="opt.php"><i class="icon-user-md icon-1x"></i>Optician</a>                 </li>
			<li><a href="surgery.php"><i class="icon-user-md icon-1x"></i>Surgeon</a>              </li>
                <li><a href="nutrients.php"><i class="icon-user-md icon-1x"></i>Nutrition Clinic</a>       </li>
                <li><a href="#"><i class="icon-user-md icon-1x"></i>Special Clinic</a>       </li-->
    
    
          
      <?php





$date_d = date('y-m-d');
//echo $date_d;
$query = "SELECT gl_account,invoice_no FROM ranges WHERE date ='$date_d' AND balance = 'No' GROUP BY invoice_no"; 	 
$result = mysql_query($query) or die(mysql_error());


$counts =0;
while($row = mysql_fetch_array($result)){
    $counts++;
}
if ($counts >0){
    echo "<u><font color ='white'><h3>Results available</u></h3></font><br>";
echo"<img src='message.gif' alt='statement' height='120' width='235'>";
}
// Print out result

$query = "SELECT gl_account,invoice_no FROM ranges WHERE date ='$date_d' AND balance = 'No' GROUP BY invoice_no"; 	 
$result = mysql_query($query) or die(mysql_error());
$count =0;
echo"<table>";
while($row = mysql_fetch_array($result)){
    echo"<tr><td><font color ='white'>".$row['gl_account'].'|'.$row['invoice_no']."</font></td></tr>";
    $count++;
}
//echo $count;
echo"</table>";
?>


      </ul>
      
      
      

      
    </section>
    <!-- /.sidebar -->
    

    
    
    
    
    
    
    
  </aside>