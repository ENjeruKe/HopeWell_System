<?php
   session_start();
require('open_database.php');
?>



<!DOCTYPE html>
<html lang="en">
  
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
var newwindow;
function popitup(url) {
	newwindow=window.open(url,'newwindow','height=600,width=900');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
function popitup2(url) {
	newwindow=window.open(url,'newwindow','height=600,width=1000');
	if (window.focus) {newwindow.focus()}
	return false;
}


function closeWin(url) {
    newwindow.close();   // Closes the new window
}

</script>
 



</head>
<?php



if (isset($_GET['billing']))
   {


    $supplier         =$_GET['supplier'];
    $bed              =$_GET['bed'];
    $ref_no        =$_GET['ref_no'];
    $date           =$_GET['date'];
    $account        =$_GET['account'];
    $patient        =$_GET['pat_name'];

      $connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.


      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_sup_inv"); 
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE companyfile SET next_sup_inv ='$ref_no2'";
        $result3 = mysql_query($query3);
        //Get data from temp file and save


   //Now go and admit patient in the appointmentf file
   $query3 = "select * FROM appointmentf" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ward     = mysql_result($result3,$i3,"id");  
     $bed_no   = mysql_result($result3,$i3,"bed_no");   
     $pat_name = mysql_result($result3,$i3,"name");   

     if ($patient==$pat_name){
        $update_ward = $ward;
        $update_bed  = $bed_no;      
        $bed_no   = mysql_result($result3,$i3,"bed_no");   
        $pat_name = mysql_result($result3,$i3,"name");   
        $adm_no = mysql_result($result3,$i3,"adm_no");   
     } 
     $i3++;
   }


    $query3 = "select * FROM allbedsfile where adm_no ='$adm_no'" ;
    $result3 =mysql_query($query3) or die(mysql_error());
    $num3 =mysql_numrows($result3) or die(mysql_error());
    $i3=0;
    while ($i3 < $num3)
        {
        $visit_no   = mysql_result($result3,$i3,"visit_no"); 
        $i3++;
        }





   $query  = "UPDATE appointmentf SET bed_no ='$bed' WHERE adm_no ='$adm_no'";
   $result = mysql_query($query);

   //clear the bed
$query  = "UPDATE allbedsfile SET patients_name ='',adm_no ='',visit_no ='' WHERE adm_no ='$adm_no'";
   $result = mysql_query($query);

   //transfer then
   $query  = "UPDATE allbedsfile SET patients_name ='$patient',adm_no ='$adm_no',visit_no ='$visit_no' WHERE bed_no ='$bed'";
   $result = mysql_query($query);


}

?>








<body>
<form action ="bed_transfer.php" method ="GET">
<?php


 //Get the receipt No.
   
 $query3 = "select * FROM companyfile" ;
 $result3 = mysql_query($query3) or die(mysql_error());
 $num3 = mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_sup_inv");
  $i3++;
  }
  $ref_no = $ref_no;
  //$query3  = "UPDATE systemf SET next_ref ='$ref_no2'";
  //$result3 = mysql_query($query3);
  //Will update next ref when saving this transaction

$date = date('y-m-d');


echo"<table width ='400' border='0' border color ='black'><tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr>";


echo"<tr><td width='100' align='right'><b>Patient: </b></td><td>";
echo"<select id='pat_name' name='pat_name'>";        
$cdquery="SELECT patients_name FROM allbedsfile WHERE patients_name<>' '";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["patients_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr>";

echo"<tr><td width='100' align='right'><b>To Bed No: </b></td><td>";
echo"<select id='bed' name='bed'>";        
$cdquery="SELECT bed_no FROM allbedsfile WHERE patients_name=' '";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["bed_no"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr></table>";

?>
<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='billing'  class='button' value='Save Changes'></td></table>
</FORM>

<!--table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='70' width='80'></td>
</table-->




</body>
</html>




