<?php
   session_start();
require('open_database.php');
?>

﻿<?php
  $company_identity = $_SESSION['company'];
  $location1 = $_SESSION['company'];
  $branch     = $_SESSION['company'];
  $date2 = date('y-m-d');
  $date1 = date('y-m-d');
  if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];

   //Get the account Number of this very account
   //--------------------------------------------
//   $query= "SELECT * FROM stockfile WHERE description ='$search' ORDER BY description" or die(mysql_error());
//   $result =mysql_query($query) or die(mysql_error());
//   $num =mysql_numrows($result) or die(mysql_error());
//   $tot =0;

//   $i = 0;
//   $SQL = "SELECT * FROM stockfile WHERE description ='$search' ORDER BY description" or die(mysql_error());
//   $hasil=mysql_query($SQL, $connect);
//   $id = 0;
//   $nRecord = 1;
//   $No = $nRecord;
//   while ($row=mysql_fetch_array($hasil)) 
//   {         
//      $acc_no      = mysql_result($result,$i,"id");  
//      $acc_name    = mysql_result($result,$i,"description");  
//      $caddress1    = mysql_result($result,$i,"location");   
//      $caddress2    = '';
//   }

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




   echo"<h2>$company</h2>";
   echo"<h3>Stock Sales Report</h3>";

   echo"<font size ='2'>";
//   echo"<table width ='900'>";      
//   echo"<tr><td align ='left'><b><u>A/C DETAILS</u></b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
//   echo"<tr><td align ='left'><b>$acc_name</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
//   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
//   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
//   echo"</table><br>";
echo '<br>';
   $to ='  To  ';
   echo"Report Date Range From :.$date1.  $to. $date2";

 

$tot =0;
$i = 0;




//Get opening balance
//-------------------



echo"<table width ='100%' border ='0'><tr><th width ='100' bgcolor ='black' align ='left'><font color ='white'>Date</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Ref No.</th><th width ='300' bgcolor ='black' align='left'><font color ='white'>Description of Service</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Doc No.</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Type</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Price</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Qty</th><th width ='50' bgcolor ='black' align='left'><font color ='white'>Total</th></tr>";



   $SQL = "select * FROM st_trans WHERE date >='$date1' AND date <= '$date2' ORDER BY date";
$hasil=mysql_query($SQL, $connect);
$query  = "select * FROM st_trans WHERE date >='$date1' AND date <= '$date2' ORDER BY date"; 
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$first = 'Yes';
$total = 0;
$tot = $open_bal;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      //Show opening balance if any
      //---------------------------
      if ($open_bal ='0'){
         echo"<tr bgcolor ='white'>";
         echo"<td width ='100' align ='left'>";      
         echo"$codes";
         echo"</td>";
         echo"<td align ='left'>";      
         echo "";
         echo"</td>";
         echo"<td align ='left'>";      
         echo 'Opening Balance';
         echo"</td>";
         echo"<td align ='left'>";      
         echo"</td>";
         echo"<td align ='left'>";      
         echo"</td>";
         echo"<td align ='right'>";
         echo"</td>";              
         echo"<td align ='right'>";
         echo"</td>";              
         echo"<td align ='right'>";
         echo strtolower("$open_bal");
         echo"</td></tr>";
         //$tot = $tot +$open_bal;
         $open_bal = 0;
      }



      
      $codes   = mysql_result($result,$i,"date");  
      $desc2    = mysql_result($result,$i,"description");   
      $desc    = mysql_result($result,$i,"trans_desc");   
      $rate    = mysql_result($result,$i,"qty");   
      $code    = mysql_result($result,$i,"ref_no");   
      $update = "";
      $service =mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"ref_no");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"adm_no");  
      $total   = mysql_result($result,$i,"price");  
      $rate = $rate*-1;
      $tot = $rate *$total;
      $tots = $tots+$tot;
      $qty     = 0;
      $codes2 = $rate; 
      $update2 = $codes2; 
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);

      //End of show opening balance
      //---------------------------
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width = '300' align ='left'>";      
      echo strtolower("$desc2");
      echo"</td>";
      echo"<td align ='left'>";      
      echo strtolower("$service");
      echo " - ".strtolower("$pay_mode");
      echo"</td>";
      echo"<td align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";
      echo"<td align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";
      //echo"<td align ='right'>";
      //echo"</td>";  
      $bb =$row['acc_no'];                    
      echo"<td align ='right'>";
      if ($rate > 0){
         echo"$total";
      }
      echo"</td>";
      echo"<td align ='right'>";
      //if ($rate < 0){
         echo"$rate";
      //}
      echo"</td>";              
      //echo"<td align ='right'>";
      //echo"</td>";              
      echo"<td align ='right'>";
      echo strtolower("$tot2");
      echo"</td></tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table width ='100%' border='0'>";   
      $tot22 = number_format($tots);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      echo"<td width ='150'><b>";      
      echo"Total";      
      echo"</b></td>";      
      echo"<td width ='70' align ='right'>";      
      echo"</td>";      
      echo"<td width ='30' align ='right'>";      
      echo"</td>";      
      echo"<td width ='70' align ='right'><b>$tot22</b></td>";      
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{
?>





<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
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



   echo"<h1>Stock sales Report</h1><br><br>";
   echo"<form action ='st_sales_report.php' method ='GET'>";

   echo"<table><tr><td>Drug Name:</td><td></td></tr>";
//   echo"<select id='search' name='search'>"; 
//   $cdquery="SELECT description FROM stockfile WHERE description<>'' ORDER BY description";
//   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//   while ($cdrow=mysql_fetch_array($cdresult)) {
//         $cdTitle=$cdrow["description"];
//   echo "<option>$cdTitle</option>";            
//   }
//   echo"</select></td><td></td>";


echo"<tr><td>Date Range From</td><td><input type='text' name='date1' value ='$date1' size='12' ></td><td> To 
Date</td><td><input type='text' name='date2' value ='$date2' size='12'></td></tr>";

echo"<tr><td><input type='submit' name='print'  class='button' value='Print Report'></td></tr></table>";

echo"</FORM>";

}

?>