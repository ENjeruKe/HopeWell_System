<?php 
/** 
 * PHP Grid Component 
 * 
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org 
 * @version 1.5.2 
 * @license: see license.txt included in package 
 */ 

// include db config 
include_once("config.php"); 

// set up DB 
mysql_connect('localhost','root','0710958791');
mysql_select_db(PHPGRID_DBNAME); 

// include and create object 
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php"); 
$g = new jqgrid(); 

// set few params 
$grid["caption"] = "Doctors Account Register"; 
$g->set_options($grid); 

// set database table for CRUD operations 
$g->table = "doctorsfile"; 

// render grid 
$out = $g->render("list1"); 

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html> 


 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>
</head>

<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li> 
			<li><a href="debtors_register.php"><i class="icon-list-alt icon-1x"></i>Acc Receivables</a></li>

		<li><a href="suppliers_register.php"><i class="icon-list-alt icon-1x"></i>Account Payables</a></li>

		
		<li><a href="doctors_register.php"><i class="icon-list-alt icon-1x"></i></i>Doctors Register</a></li>

		<li><a href="revenue_register.php"><i class="icon-list-alt icon-1x"></i>Revenue Code</a></li>
          <li><a href="gl_accounts_register.php"><i class="icon-list-alt icon-1x"></i>GL Acc Register</a></li>

		<li><a href="disease_register.php"><i class="icon-list-alt icon-1x"></i>Diagnosis Register</a></li>

		<li><a href="symptoms_register.php"><i class="icon-list-alt icon-1x"></i>Signs $ Symp Reg</a></li>

				<li><a href="delete_patients.php"><i class="icon-list-alt icon-1x"></i>Delete Wrong Pat</a></li>



			<!--li><a href="#"><i class="icon-bar-chart icon-1x"></i>Balance Sheet</a>                </li>
         <li><a href="invoices.php"><i class="icon-list-alt icon-1x"></i>Invoices</a>          </li>
			<li><a href="#"><i class="icon-bar-chart icon-1x"></i>Finalized Invoices</a>                </li-->


					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i>  Reports
			</div>
			<ul class="breadcrumb">
			<!--li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li-->
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>




<head> 
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>     
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>     
  
    <script src="lib/js/jquery.min.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>     
    <script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script> 

</head> 
<body> 
    <div style="margin:10px"> 
    <p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p> 
    <?php echo $out?> 
    </div> 
</body> 
</html> 

 