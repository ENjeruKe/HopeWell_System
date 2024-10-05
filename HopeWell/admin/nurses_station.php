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
			<li><a href="patients_reg_add.php"><i class="icon-list-alt icon-1x"></i>Admit Patient</a>                                     </li>
			<li><a href="discharge_patients.php"><i class="icon-list-alt icon-1x"></i>Discharge Patient</a>                                    </li>
			<li><a href="beds_register.php"><i class="icon-list-alt icon-1x"></i>Bed $ Wards Reg</a>                                    </li>
			<li><a href="nurses_station.php"><i class="icon-list-alt icon-1x"></i>Nurses Page</a>                                     </li>
			<!--li><a href="debit_notes2.php"><i class="icon-list-alt icon-1x"></i>Post Debit Note</a>                                     </li-->
			<li><a href="credit_notes2.php"><i class="icon-list-alt icon-1x"></i>Post Credit Note</a>                                    </li>


             <li><a href="bed_transfer.php"><i class="icon-list-alt icon-1x"></i>Bed Transfer</a>                                     </li>
			<!--li><a href="#"><i class="icon-list-alt icon-1x"></i>Post Credit Note</a-->                                    </li>
			<li><a href="#"><i class="icon-list-alt icon-1x"></i>Finalize Invoice</a>                                    </li>



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
	<div class="contentheader" align ='right'>
			<i class="icon-bar-chart"></i><font color ='green'>Bed Transfer</font>
			</div>
			<ul class="breadcrumb">
			<!--li><a href="index.php">Dashboard</a></li> /
			<li class="active">Sales Report</li-->
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="in_patient_register.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a><h1><font color ='white'>.</h1>



<body>
<div class="w3-container w3-teal">
  <!--h3>Medical | <font color ='yellow'>DISCHARGE SUMMARY FORM</font></h3-->
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container" align ="right">

<script language="javascript" type="text/javascript">
<!--
var newwindow;
function popitup(url) {
	newwindow=window.open(url,'newwindow','height=570,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
function popitup2(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}

function popitup22(url) {
	newwindow=window.open(url,'newwindow','height=300,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

function popitup3(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}

function closeWin(url) {
    newwindow.close();   // Closes the new window
}


function myFunction() {
    var myWindow = window.open("patients_receipt.php", "", "width=1000, height=600");
}
</script>


<style>
#header {
    line-height:30px;
    background-color:white;
    height:20px;
    width:900px;
    float:left;
    padding:2px;	      
}

#hd2 {
    background-color:blue;
    color:white;
    text-align:left;
    padding:5px;
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:450px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav1 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav2 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:200px;
    float:left;
    padding:5px;	      
}

#nav3 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav4 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:150px;
    float:left;
    padding:5px;	      
}

#nav4a {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav5 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:75px;
    float:left;
    padding:5px;	      
}

#nav6 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:60px;
    float:left;
    padding:5px;	      
}
#nav7 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:20px;
    float:left;
    padding:5px;	      
}

#nav8 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:5px;
    float:left;
    padding:5px;	      
}

#section {
    height:350px;
    width:900px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>





<!--div id="section"-->
<OBJECT data="nurses_station_pg2.php" type="text/html" style="margin: 0%; width: 100%; height: 650px; padding 0px; text-align:left;"></OBJECT>
<!--/div-->



</div>


<div id="footer">

Copyright © Paltech-systems.com | Affordable Connections - Call. +254-729-446-243
</div>
</body>
</DIV>
</html>