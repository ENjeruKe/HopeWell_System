<?php
session_start();
 require('open_database.php');
include('../connect.php');

?>






<style>
body {font-family: arial, Arial, Helvetica, sans-serif; font-size: 12px}
body {
        height: 100%;/*297*/
        width: 98%;
    }
dt { float: left; clear: left; text-align: right; font-weight: bold; margin-right: 10px } 
dd {  padding: 0 0 0.5em 0; }
</style> 
<style type="text/css" media="print">
@page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>  





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $date2 = $date2.' 24:60:60';


   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;



   $i = 0;
   $SQL = "select * FROM companyfile" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
   }
   echo"<font size ='2'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";

   echo"<h4>MONTHLY DIAGNOSIS SUMMARY REPORT <img src='space.jpg' style='width:20px;height:2px;'>"."Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;
echo"</h4>";
//   echo"Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;

   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";





$today = date('y-m-d');
$mdate =date('y-m-d');
//$date1  = $_GET['date1'];
//$date2  = $_GET['date2'];

$query  = "select * FROM auto_diagnosis WHERE date >='$date1' AND date <= '$date2' ORDER BY date,invoice_no" ;
$result =mysql_query($query);
$num =mysql_numrows($result);





$tot =0;
$i = 0;
                                                         






?>
<table width ='100%'>
<tr>
<th bgcolor ='black' width ='30%'><font color ='white'>Disease</th>
<th bgcolor ='black' width ='10%'><font color ='white'>Number of Patients</th>
<th bgcolor ='black' width ='10%'><font color ='white'> Male </th>
<th bgcolor ='black' width ='10%'><font color ='white'> Female </th>
<th bgcolor ='black' width ='10%'><font color ='white'> Below 5 Female</th>
<th bgcolor ='black' width ='10%'><font color ='white'> Below 5 Male </th>
<th bgcolor ='black' width ='10%'><font color ='white'> Above 5 Female </th>
<th bgcolor ='black' width ='10%'><font color ='white'> Above 5 Male </th>
</tr>
<hr>

<?php

$query = "SELECT description FROM auto_diagnosis WHERE date >='$date1' AND date <= '$date2' GROUP BY description"; 	 
$result = mysql_query($query) or die(mysql_error());
while ($row=mysql_fetch_array($result)) {
      $test = $row['description'];
//echo 'Test'.$test;
    $SQL ="select * FROM auto_diagnosis WHERE description ='$test' and date >='$date1' AND date <= '$date2' ORDER BY date" ;   
       $hasil=mysql_query($SQL, $connect);
       $id = 0;
       $nRecord = 1;
       $No = $nRecord;
       $debit  = 0;
       $credit = 0;
       $tot_bill = 0;
       $tot_paid = 0;
       $docno ='';
       echo "<table width ='100%'>";
       $paid =0;

    while ($row=mysql_fetch_array($hasil)) {
         echo "<tr>";
    //   echo "<td width ='100'>" . $row['date'] . "</td>";
     //  echo "<td width ='350'>" . $row['gl_account'] . "</td>";
      $_SESSION['ref_no'] =$row['invoice_no'];  
      $aa =$row['invoice_no'];        
      $aa5=$row['description'];   
      $update2 =$row['qty'];
      $coz =$row['credit_rate'];
      $paid = $update2;
      $aa7=$row['date'];        
    //  echo "<td width ='50'>$aa</td>";
    //   echo "<td width ='200'>" . $row['description'] . "</td>";
    //   echo "<td align ='right' width ='100'>" . number_format($row['qty']) . "</td>";
       $tot_bill = $tot_bill+$paid;
       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
    //   echo "<td align ='right' width ='100'>" . $tot_bill2. "</td>";
       echo "</tr>";



$rowcount3 = 0;
$rowcount2 = 0;
$rowcount4 = 0;
$rowcount5 = 0;
$rowcount6 = 0;
$rowcount7 = 0;
$rowcount8 = 0;
$rowcount9 = 0;


//------------------checking on results------------------------

	$result3 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='M'and date >='$date1' AND date <= '$date2'");
				$result3->execute();
				$rowcount3 = $result3->rowcount();
			

	$result2 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='F'and date >='$date1' AND date <= '$date2'");
				$result2->execute();
				$rowcount2 = $result2->rowcount();
//*********************With age male************************************* */



$result4 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='M' and credit_rate<=5 and date >='$date1' AND date <= '$date2'");
$result4->execute();
$rowcount4 = $result4->rowcount();


$result5 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='M' and credit_rate>5 and date >='$date1' AND date <= '$date2'");
$result5->execute();
$rowcount5 = $result5->rowcount();

//*********************With age female************************************* */



$result6 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='F' and credit_rate <=5 and date >='$date1' AND date <= '$date2'");
$result6->execute();
$rowcount6 = $result6->rowcount();


$result7 = $db->prepare("SELECT * FROM `auto_diagnosis` WHERE description ='$test' and sell_price='F' and credit_rate >5 and date >='$date1' AND date <= '$date2'");
$result7->execute();
$rowcount7 = $result7->rowcount();


//--------------------------------------------------------------



                }
    
      echo"</table>";
    //  echo"<hr>";
      echo"<table border='0' width ='100%'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";


      echo"<td width ='30%' align ='left'>";
      echo"<b>$aa5</b>";      
      echo"</td>"; 







      echo"<td width ='10%' align ='center'><b>$tot_bill2</b></td>";  
      echo"<td width ='10%' align ='center'><b>$rowcount3</b></td>";      
      echo"<td width ='10%' align ='center'><b>$rowcount2</b></td>";        
      
      
      echo"<td width ='10%' align ='center'><b>$rowcount6</b></td>";      
      echo"<td width ='10%' align ='center'><b>$rowcount4</b></td>";      
      echo"<td width ='10%' align ='center'><b>$rowcount7</b></td>";        
      echo"<td width ='10%' align ='center'><b>$rowcount5</b></td>";    
      



      echo"</tr>";   
      //echo"</font>";
echo"<hr>";   
      echo"</table>";
}
 }else{      
?>









<!DOCTYPE html>
<html>
<title>HMIS Global</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>
<body>
<div class="w3-container w3-teal">
  <h1>Monthly Diagnosis Summary Report | <font color ='red'></font></h1>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">
<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>

<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(images/backgrounds.jpg);
background-repeat: no-repeat;
background-size: cover;
}
</style>











<?php
  echo"<br>";
  echo"<form action ='sbd.php' method ='GET'>";
  echo"<table><tr><td width ='50'>From Date:</td><td><input type='date' name='date1' value ='$date1' size='12' ></td></tr>";
  echo"<tr><td width='50'>To Date:</td><td><input type='date' name='date2' value ='$date2' size='12'></td><tr>";
  echo"<tr><td width='50'><input type='submit' name='print'  class='button' value='Print Report'></td><td></td></tr>";
echo"</FORM>";


$today = date('y/m/d');


?>
<table width ='20' border='0' height='220'></table>

</div>
<div class="w3-container w3-teal">
  <p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p>
</div>
</body>
</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>
<?php
}
?>