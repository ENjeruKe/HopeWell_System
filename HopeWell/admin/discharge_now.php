<?php
session_start();
require('open_database.php');
$username = $_SESSION['username'];
$date =$_SESSION['sys_date'];

$adm_time = date("y-m-d g:i:s", strtotime("$date"));
$adm_date = $adm_time;


   //-
   $adm_times = substr($adm_time,9,7);

?>






<!DOCTYPE html>
<html lang="en">
  
 


<?php
$adm_no = $_SESSION['adm_no'];
$name = $_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$visit_no = $_SESSION['ref_no'];
   
$date = $_SESSION['sys_date'];

?>

<body >

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
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php


if (isset($_GET['accounts'])){
   $adm_no =$_GET['accounts'];
   //Now go and discharge patient in the clients file
   $query3 = "select * FROM appointmentf where adm_no ='$adm_no'";
   $result3 =mysql_query($query3);
   $num3 =mysql_numrows($result3);
   $i3=0;
   while ($i3 < $num3)
     {
        $adm_no  = mysql_result($result3,$i3,"adm_no");   
        $name  = mysql_result($result3,$i3,"name");   
        $payer      = mysql_result($result3,$i3,"payer");
        $adm_date     = mysql_result($result3,$i3,"adm_date");
        $bed_no  = mysql_result($result3,$i3,"bed_no");  
        $ref_no  = mysql_result($result3,$i3,"subchief");  
     $i3++;
     }
 }





if (isset($_GET['billing']))
   {
   $total = 0;
   //Get data from temp file and save
   $bed_no              =$_GET['bed_no'];
   $ref_no        =$_GET['ref_no'];
   $date           =$_GET['date'];
   $adm_no         =$_GET['adm_no'];
   $name           =$_GET['name'];
   $patients_name  =$_GET['name'];
   $admitted  =$_GET['admitted'];
   $payer      =$_GET['payer'];

   //Now go and discharge patient 
   $query3 = "select * FROM allbedsfile where visit_no ='$ref_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ward     = '';
     $bed_no   = mysql_result($result3,$i3,"bed_no");   
     $patient  = mysql_result($result3,$i3,"patients_name");
     $visit_no = mysql_result($result3,$i3,"visit_no");      
     $i3++;
   }
   $query  = "UPDATE allbedsfile SET patients_name ='',visit_no = '',adm_no = '' WHERE visit_no ='$visit_no'";
   $result = mysql_query($query);

   $query1  = "UPDATE nurses SET status ='Discharged' WHERE adm_no ='$adm_no'";
   $result1 = mysql_query($query1);


   //Tabulate the date of discharge
   //------------------------------
   $today = $_SESSION['sys_date'];
   $dis_time = date("y-m-d g:i:s", strtotime("$today"));
   $dis_date = $dis_time;
   $dis_times = substr($dis_time,9,7);


   //Compute days
   //------------

   $adm_dates = strtotime("$admitted");
   $dis_dates = strtotime("$dis_time");

   $mm = $dis_dates-$adm_dates;
   $days = ($mm/86400);
   //echo 'Days'.$days;

   $query  = "UPDATE appointmentf SET dis_date ='$dis_date',bed_no ='',ward='',status='Discharged',weight='$days' WHERE adm_no ='$adm_no'";
   $result = mysql_query($query);

   //Now go to the admission file and get info.
   //------------------------------------------
   //Now go and admit patient in the clients file
   $query3 = "select * FROM admitfile where adm20 ='$visit_no'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $diagnosis1 = mysql_result($result3,$i3,"provisional_diag");   
     $diagnosis2 = mysql_result($result3,$i3,"final_diag");   
     $complains  = mysql_result($result3,$i3,"complains");   
     $investigations = mysql_result($result3,$i3,"tests_and_results");   
     $adm_date = mysql_result($result3,$i3,"adm_date");   
     $i3++;
   }

   //Now go and update discharge file
   $query= "INSERT INTO dischargef VALUES('','$adm_no','$update_name','$adm_date','$bed_no','$company','$age','$sex','','','','','','$complains','$address','','','','$investigations','$diagnosis1','$diagnosis2','','','$dis_date','$dis_time','','','','','','','','','','','')";
   $result =mysql_query($query);

$dis_time = substr($dis_date,11,9);
//Go and indicate discharge date
//------------------------------
$query2= "UPDATE admitfile SET dis_date ='$dis_date',dis_time='$dis_time' WHERE adm20 ='$visit_no'";
   $result2 =mysql_query($query2);

//Go and remove the patient from medicalfile inpatient flag
//---------------------------------------------------------
$query2= "UPDATE medicalfile SET status ='Discharged' WHERE ref_no ='$ref_no'";
$result2 =mysql_query($query2);




$adm_no = '';
$name = '';
$ref_no ='';
$visit_no = '';
   
$date = $_SESSION['sys_date'];

}

?>








<body>
<form action ="discharge_now.php" method ="GET">
<?php

 //Get the receipt No.
 echo"<br><br><br><table width ='400' border='0' border color ='black'><td width='50' align='right'><b>Ref No.: </b></td><td><input type='text' name='ref_no' size='20' value ='$ref_no'></td></tr><tr><td width ='50' align ='right'><b>Discharge Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr>";
 echo"<tr><td width='100' align='right'><b>IP Number: </b></td><td><input type='text' name='adm_no' size='20' value ='$adm_no'></td></tr>";
 echo"<tr><td width='100' align='right'><b>Patient: </b></td><td><input type='text' name='name' size='30' value ='$name'></td></tr>";
 echo"<tr><td width='100' align='right'><b>Admit Date: </b></td><td><input type='text' name='admited' size='15' value ='$adm_date'></td></tr>";
 echo"<tr><td width='100' align='right'><b>Bed No: </b></td><td><input type='text' name='bed_no' size='10' value ='$bed_no'></td></tr>";
 echo"<tr><td width='100' align='right'><b>Pay A/c: </b></td><td><input type='text' name='payer' size='30' value ='$payer'></td></tr></table>";


?>
<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='billing'  class='button' value='Discharge Patient'></td></table>
</FORM>

</table>




</body>
</html>





