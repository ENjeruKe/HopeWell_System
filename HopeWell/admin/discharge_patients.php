<?php
session_start();
require('open_database.php');
$today = $_SESSION['sys_date'];
?>





<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<title>
In Patient
</title>
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





<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">














<body>
<form action ="discharge_now.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Card'>Card</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
<?php

//$mleast =123552620;
//$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Card'){
     $query = "select * FROM  appointmentf WHERE adm_no LIKE '%$search%' ORDER BY name" ;
     $SQL = "select * FROM  appointmentf WHERE adm_no LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  appointmentf WHERE phone LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE phone LIKE '%$search%' ORDER BY name" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
     $SQL   = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name" ;
   }
 }else{
   $query= "SELECT * FROM appointmentf WHERE bed_no<>'' ORDER BY adm_date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM appointmentf WHERE bed_no<>'' ORDER BY adm_date DESC" or die(mysql_error());
}

//substr($desc, -10);

$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());


$tot =0;
$i = 0;


                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th>File Number</th><th width ='400'>Patient Name </th><th>Phone No.</th><th>Sex</th><th width ='200'>Adm Date</th><th width ='300'>Pay Account</th><th>Discharge</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"adm_date");  
      $contact = mysql_result($result,$i,"dis_date");  
      $street  = mysql_result($result,$i,"bed_no");
      $age    = mysql_result($result,$i,"age");
      $phone  = mysql_result($result,$i,"telephone");
  
      $codes2 = 0; 
      $update2 = $codes2; 
      //&& -$update;
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no']; 
      $aa =$row['name']; 
       
      //$cc =$row['adm_date']; 
      //$mm =substr($street,0,2);
 
      if (substr($street,0,2) =='NG'){
         echo"<td width ='60' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='60' align ='left'>";
      }
echo"<a href=javascript:popcontact3('debit_notes2.php?accounts3=$bb')>$codes</a>";      
      echo"</td>";
      if (substr($street,0,2) =='NG'){
         echo"<td width ='400' align ='left' bgcolor ='green'>";
      echo"<a href=javascript:popcontact5('patients2_reg_edit.php?accounts3=$bb&accounts=$bb')><font color ='white'>$desc</font><img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }else{
         echo"<td width ='400' align ='left'>";
      echo"<a href=javascript:popcontact5('patients2_reg_edit.php?accounts3=$bb&accounts=$bb')>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }
      echo"</td>";            
      //echo"<td width ='30'>";      
      if (substr($street,0,2) =='NG'){
         echo"<td width ='30' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='30' align ='left'>";
      }
      echo"$phone";
      echo"</td>";      

      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='20' align ='left'>";
      }
      //echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";

      if (substr($street,0,2) =='NG'){
         echo"<td width ='40' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='40' align ='left'>";
      }
      //echo"<td width ='40'>";
      echo"$update";
      echo"</td>";

      //echo"<td width ='20'>";
      //echo"$street";
      //echo"</td>";

      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
      }else{
         echo"<td width ='20' align ='left'>";
      }
      //echo"<td width ='20'>";
      echo"$code";
      echo"</td>";

      $bb =$row['adm_no'];        
      $aa =$row['adm_no'];        
      $aa3=$row['age'];        
      $aa7=$row['phone'];         
      $aa8=$row['Name'];
      $aa9=$row['adm_date']; 
      $a10=$row['payer']; 

      if (substr($street,0,2) =='NG'){
         echo"<td width ='20' align ='left' bgcolor ='green'>";
echo"<a href=javascript:popcontact6('post_receipts.php?accounts=$aa&accounts3=$bb')><font color ='white'>Pay</font><img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";
      }else{
         echo"<td width ='20' align ='left'>";
echo"<a href=javascript:popcontact6('discharge_now.php?accounts=$aa')>Yes<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a></td>";
      }
      




      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

      echo"</td>";

      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150'><h4>";
      echo"</h4></td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>";
echo"</td>";
echo"<td width ='100' align ='right'><h4></h4></td>";
echo"<td width ='50'></td>";




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>
<?php
//die();
?>














