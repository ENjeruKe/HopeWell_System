<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$today = $_SESSION['sys_date'];

ini_set('max_execution_time', 240);


?>



<?php
if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-----------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   //$today =date('y-m-d');
   $today = $_SESSION['sys_date'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $diag1 =$_GET['diag1'];
   $diag2 =$_GET['diag2'];
   $test1 =$_GET['test1'];
   $textarea =$_GET['textarea'];
   $textarea2 =$_GET['textarea2'];
   $complain  =$_GET['textarea2'];


   $query2= "UPDATE admitfile SET location ='$location',doctor='$doctor',weight='$weight',temp='$temp',b_p='$b_p',height='$height',sign1='$sign1',sign2='$sign2',sign3 ='$sign3',notes='$textarea' WHERE adm_no ='$adm_no' and date='$today'";
   $result2 =mysql_query($query2);


 //End of Invoice transactions
 //---------------------------
}


   $grand_total = $test_total+$drug_total;


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | ADMISSION FORM : Page </title>
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
<table align ='right'><td align ='right'>
<form action ="nhif_treatment_summary.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate = $_SESSION['sys_date'];

echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Payer'>Payer</option></select>";
?>
</FORM>
</td></table><br>
<?php

   


$mleast =123552620;
$mdate = $_SESSION['sys_date'];
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY age,sex desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY age,sex desc" ;
   }

 }else{
   $query= "SELECT * FROM medicalfile where date ='$mdate' ORDER BY name,date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM medicalfile where date ='$mdate' ORDER BY name,date ORDER BY name DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='5%'>IP Number</th><th width ='20%'>Patients Name</th><th width ='3%'>Age</th><th width ='2%'>Sex</th><th width ='30%'>Treatment</th><th width ='18%'>Diagnosis</th><th width ='15%'>Payer</th><th width ='7%'>Status</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$i=0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($result)) 
      {         
      $id      = mysql_result($result,$i,"id");  
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight"); 
      $pay_acc = mysql_result($result,$i,"gl_account");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $type   = mysql_result($result,$i,"type");;
      $doctor = mysql_result($result,$i,"b_p");
      $noti = mysql_result($result,$i,"status");
      $notified = mysql_result($result,$i,"line_no");
      $checker = mysql_result($result,$i,"sell_price");
      //$diag1 = mysql_result($result,$i,"diag1");
      //$diag2 = mysql_result($result,$i,"diag2");
      //$diag3 = mysql_result($result,$i,"diag3");
      $diagnosis = mysql_result($result,$i,"drug7_issued");

      //$diagnosis = $diag1.','.$diag2.','.$diag3;

      $ref_nos= " ";

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa2 =$row['id'];
      $aa3 =$row['ref_no'];
      $_SESSION['ref_nof']=$aa3;

      if ($type=='Inpatient'){
echo"<td width ='5%' align ='left' bgcolor ='black'><font color ='white'>$codes</font></td>";
}else{
echo"<td width ='5%' align ='left'>$codes</td>";
}
      echo"<td width ='20%' align ='left'><a href=javascript:popcontact14('print_nhifsummary.php?accounts3=$bb&accounts=$aa&ref_no=$aa3')>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      if ($type=='Inpatient'){
         echo"<td width ='3%' bgcolor ='black'><font color ='white'>$age</font></td>";      
      }else{
         echo"<td width ='3%'>$age</td>";      
      }
      echo"<td width ='2%'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='30%'>";

//Go and get tests in tests file
//------------------------------
$how ='';
$checker ='1';
if ($checker<>0){
   if ($pay_acc==''){
      $query0= "SELECT * FROM auto_transact where invoice_no 
   ='$aa3'";
$how ='Cash';
   }else{
$how ='inv';
      $query0= "SELECT * FROM auto_transact_inv where invoice_no 
   ='$aa3'";
   }
   $result0 =mysql_query($query0);
   $num0 =mysql_numrows($result0);

   $hasil0=mysql_query($query0, $connect);
   $id = 0;
   $i0=0;
   $nRecord = 1;
   $No = $nRecord;
   $it_is ='';
   while ($row=mysql_fetch_array($result0)) 
     {         
     $desc1    = mysql_result($result0,$i0,"description");   
     $it_is = $it_is.', '.$desc1;
     $i0++;
   }
}








      echo"$it_is";
      echo"</td>";
      //if ($type=='Inpatient'){
      //   echo"<td width ='350' bgcolor ='black'>";
      //}else{
      //   echo"<td width ='350'>";
      //}
      //if ($type=='Inpatient'){
      //   echo"<font color ='white'>";
      //}else{
      //   echo"<font color ='black'>";
      //}
      //echo"$type";
      //echo"</font></td>";
      // blocked by ben echo"<td width ='350'>$notified</td>";

//---------------------------------------------------

      $checker5 ='1';
      if ($checker5<>0){
            $query6= "SELECT * FROM auto_diagnosis where invoice_no 
         ='$aa3'";
        
         $result6 =mysql_query($query6);
         $num6 =mysql_numrows($result6);
      
         $hasil6=mysql_query($query6, $connect);
         $id = 0;
         $i6=0;
         $nRecord = 1;
         $No = $nRecord;
         $it_is6 ='';
         while ($row=mysql_fetch_array($result6)) 
           {         
           $desc6    = mysql_result($result6,$i6,"description");   
           $it_is6 = $it_is6.', '.$desc6;
           $i6++;
         }
      }




      //------------------------------------------------------
      //echo"<td width ='350'>$diagnosis</td>";
      echo"<td width ='18%'>$it_is6</td>";
      $bb =$row['id_no'];        
      $aa =$row['id_no'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['adm_date']; 

echo"<td width ='15%'>$pay_acc</td><td width ='7%'>$noti</td></tr>";
   

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


