<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>



<?php



if (isset($_GET['save_cancel'])){  
   $test1_result  ='';
   $test2_result  ='';
   $test3_result  ='';
   $test4_result  ='';
   $test5_result  ='';

   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $ref_nos =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today =date('y-m-d');
   $sex =$_GET['sex'];
   $age =$_GET['age'];
//echo '$ref_nos';

   $test1 =$_GET['test1'];
   $test2 =$_GET['test2'];
   $test3 =$_GET['test3'];
   $test4 =$_GET['test4'];
   $test5 =$_GET['test5'];
   $results =$test1.','.$test2.','.$test3.','.$test4.','.$test5;
   if ($status=='To cash office'){
      //Go and update the receipts file on whare need to be paid for.
      //------------------------------------------------------------
   }else{
//echo 'Step1';
      
      if (isset($_GET['test1_result'])){
         $test1_result  =$_GET['test1_result'];
         $query3= "UPDATE medicalfile SET test1 ='$test1',test1_result='$test1_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test2_result'])){
         $test2_result  =$_GET['test2_result'];
         $query3= "UPDATE medicalfile SET test2 ='$test2',test2_result='$test2_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test3_result'])){
         $test3_result  =$_GET['test3_result'];
         $query3= "UPDATE medicalfile SET test3 ='$test3',test3_result='$test3_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test4_result'])){
         $test4_result  =$_GET['test4_result'];
         $query3= "UPDATE medicalfile SET test4 ='$test4',test4_result='$test4_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);
      }
      if (isset($_GET['test5_result'])){
         $test5_result  =$_GET['test5_result'];
         $query3= "UPDATE medicalfile SET test5 ='$test5',test5_result='$test5_result' WHERE ref_no ='$ref_nos'";
         $result3 =mysql_query($query3);   
      } 
      $query3= "UPDATE medicalfile SET status='$status' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);    
      
      if ($results<>''){     
         $query3= "UPDATE admitfile SET tests_and _results='$results' WHERE adm_no ='$adm_no'";
         $result3 =mysql_query($query3);    
      }

   }
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Doctors Page </title>
<head>

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
<a href=javascript:popcontact505('lab_walk_in.php')><b>Walk in Patient</b></a><br>
<table align ='right'><td align ='right'>
<form action ="patients_register_lab.php" method ="GET">
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
</td></table><br>
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Diagnosis'){
     $query = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
 }else{
   $query= "SELECT * FROM medicalfile where status ='To Laboratory' and date ='$mdate' ORDER BY date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM medicalfile where status ='To Laboratory'and date ='$mdate' ORDER BY date DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Pay Account</th><th>Weight</th><th>B.P</th><th>Type</th></tr>";


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
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");
      $status = mysql_result($result,$i,"type");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   

      echo"<td width ='10' align ='left'>$codes";      
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='patients_lab_edit.php?accounts3=$bb&accounts=$aa'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
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
      echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 
      echo"<td width ='40' align ='right'>$status</td>";




      




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

