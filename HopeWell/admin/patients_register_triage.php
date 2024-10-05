<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username = $_SESSION['username'];
ннн//$mtod = $_SESSION['sys_date'];

?>



<?php
if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today =date('y-m-d');
   $today = $_SESSION["log_date"];
   $ref_nox =$_GET['ref_no'];


 $time = date("Y-m-d H:i:s");
 $time = $_SESSION["log_date"];
 $timew = date("H:i:s");
 $adm_date = date("Y-m-d H:i:s");
  
   //Go and dabit gltransf A/c
   //-------------------------
   $query5= "UPDATE appointmentf SET weight ='$weight',temp='$temp',b_p='$b_p',height='$height',status='$status' WHERE adm_no ='$adm_no'";
   $result5 =mysql_query($query5);  
  
   $query= "UPDATE medicalfile SET weight ='$weight',temp='$temp',b_p='$b_p',height='$height',status='$status' WHERE adm_no ='$adm_no'";
   $result =mysql_query($query);


  $query= "UPDATE newprescription SET Weight ='$weight',Temp='$temp',Bp1='$b_p',PulseRate='$height',TriageTime='$timew' WHERE OpNo ='$ref_nox'";
   $result =mysql_query($query);
   
   
$time = $_SESSION["log_date"];
//$time = date('y-m-d h:i:s a', time());
//$time = date("Y-m-d H:i:s");


 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Triage')";
 $result5 =mysql_query($query5);

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Triage </title>
<head><meta charset="ibm866">

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
	border-width: 2px;
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

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">















<body>
<table align ='right'><td align ='right'>
<form action ="patients_register_triage.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
</td></table>
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');
//$mdate ='2016-04-27';


$mdate= $_SESSION['sys_date'];

if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  appointmentf WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Mobile'){
     $query = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL   = "select * FROM  appointmentf WHERE telephone LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name,app_date desc" ;
     $SQL   = "select * FROM  appointmentf WHERE name LIKE '%$search%' ORDER BY name,app_date desc" ;
   }
 }else{
   $query= "SELECT * FROM appointmentf where app_date ='$mdate' ORDER BY app_date DESC" or die(mysql_error());
   //(status ='To Triage' or status ='') and
   $SQL  = "SELECT * FROM appointmentf where app_date ='$mdate' ORDER BY app_date DESC" or die(mysql_error());
   // (status ='To Triage' or status ='') and
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;



echo"<br><br>";
                                                         
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Phone No.</th><th>Sex</th><th>App.Date</th><th>Status.</th><th>Pay Account</th><th>Age</th><th>Doctor</th><th>Weight</th><th>Temp</th><th>B.P</th><th>Pulse</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"id");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"app_date");  
      $contact = mysql_result($result,$i,"bed_no");  
      $street  = mysql_result($result,$i,"status");
      $age    = mysql_result($result,$i,"age");
      $phone  = mysql_result($result,$i,"telephone");
      $doctor = mysql_result($result,$i,"doctor");
      $info = mysql_result($result,$i,"other_info");
      $weight = mysql_result($result,$i,"weight");
      $temp = mysql_result($result,$i,"temp");
      $b_p = mysql_result($result,$i,"b_p");
      $pulse = mysql_result($result,$i,"height");
    
      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        

      echo"<td width ='10' align ='left'>$codes";      
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='patients_triage_edit.php?accounts3=$bb&accounts=$bb'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$phone";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='60'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      echo"$code";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 

echo"<td width ='20' align ='right'>$age</td>";
     echo"<td width ='150'>";
      echo"$info";
      echo"</td>"; 
echo"<td width ='20'>";
      echo"$weight";
      echo"</td>";

echo"<td width ='20'>";
      echo"$temp";
      echo"</td>";

echo"<td width ='20'>";
      echo"$b_p";
      echo"</td>";
echo"<td width ='20'>";
      echo"$pulse";
      echo"</td>";




      




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

