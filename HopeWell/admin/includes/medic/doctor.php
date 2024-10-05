<?php
session_start();
 require('open_database.php');
?>
 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #alert_popover
  .wrapper {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:200px;
  }
  .alert_default
  {
   color: ;
   background-color: #f2f2f2;
   border-color: #cccccc;
  }
  </style>



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
        
        <li><a href="patients_doctor.php"><i class="icon-user-md icon-1x"></i>Out Patient</a>  </li>             
          <li><a href="in_patients_doctor.php"><i class="icon-user-md icon-1x"></i>In Patient</a>  </li>             
			<li><a href="completed.php"><i class="icon-user-md icon-1x"></i>Completed Patients</a>          </li>
			<!--li><a href="dent.php"><i class="icon-user-md icon-1x"></i>Dental</a>                 </li>
			<li><a href="opt.php"><i class="icon-user-md icon-1x"></i>Optician</a>                 </li>
			<li><a href="surgery.php"><i class="icon-user-md icon-1x"></i>Surgeon</a>              </li>
                <li><a href="nutrients.php"><i class="icon-user-md icon-1x"></i>Nutrition Clinic</a>       </li>
                <li><a href="#"><i class="icon-user-md icon-1x"></i>Special Clinic</a>       </li-->
    
    

 <div id="alert_popover">
    <div class="wrapper">
     <div class="content">

     </div>
    </div>
   </div>




      </ul>
      
      
      

      
    </section>
    <!-- /.sidebar -->
    

<script>
$(document).ready(function(){

 setInterval(function(){
  load_last_notification();
 }, 5000);

 function load_last_notification()
 {
     
  $.ajax({
   url:"incoming.php",
   method:"POST",
   success:function(data)
   {
    $('.content').html(data);
   }
  })

 }



 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
    }
   })
  }
  
  else
  {
   alert("Both Fields are Required");
  }
 });
});
</script>

    

    
    
    
    
  </aside>