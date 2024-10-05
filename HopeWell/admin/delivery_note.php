<?php
session_start();
?>
﻿<?php
 require('open_database.php');

 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];


   //--------------------------------------------
   $query= "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"accno");  
      $acc_no2      = mysql_result($result,$i,"client_id");  
      $acc_name    = mysql_result($result,$i,"account_name");  
      $caddress1    = mysql_result($result,$i,"telephone_no");   
      $caddress2    = mysql_result($result,$i,"address");   
   }

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
      $address4    = mysql_result($result,$i,"address4");   

   }
   //echo"<font size ='2'>";
   echo"<table width ='900'><h1>";      
   echo"<tr><td align ='left'><b>$acc_name</b></td><td width ='50'></td><td align ='right'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='50'></td><td align ='right'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='50'></td><td align ='right'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='50'></td><td align ='right'><b>$address3</b></td></tr>";
   echo"<tr><td align ='left'></td><td width ='50'></td><td align ='right'><b>$address4</b></td></tr>";
   echo"</table><br></h1>";
   $to ='  To  ';
   echo'<br><br><h2><u>DELIVERY NOTE</u></h2><br><br>';

   echo'Dear Sir/Madam,<br>';
   echo"Attached herewith please find medical bills for your staff/clients  delivered to you today.Bills are dated from : $date1  $to $date2. Please sign the duplicate of this letter as proof of receipt and return the same to us.<br>";
   //echo"Invoiced Dated from : $date1  $to $date2";
   $query  = "select * FROM dtransf WHERE trim(acc_no) = '$search' AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
   //OR acc_no = '$acc_no2' OR acc_no = '$acc_name' 
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:110px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:20px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:30px;height:2px;'>";
echo"Amount<img src='space.jpg' style='width:70px;height:2px;'>";
echo"Run Total<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   //$SQL ="select * FROM dtransf WHERE acc_no = '$acc_no' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;   
   $SQL = "select * FROM dtransf WHERE trim(acc_no) = '$search'  AND date >='$date1' AND date <= '$date2' and type<> 'RC' ORDER BY date"; 
// OR acc_no = '$acc_no2' OR acc_no = '$acc_name'

 }else{
  $SQL= "SELECT * FROM dtransf ORDER BY date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
//echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $qty     = 0;

      $codes2 = $rate; 
      $update2 = $codes2;

      $tot = $tot +$total;
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='100' align ='left'>";      
      echo strtoupper("$update");
      //strtolower
      echo"</td>";
      echo"<td width ='280' align ='left'>";      
      echo strtoupper("$contact");
      echo"</td>";

      echo"<td width ='60' align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";

      echo"<td width ='50' align ='right'>";
      //echo"$update2";
      echo"</td>";  

      $bb =$row['acc_no'];                    
      echo"<td width ='50' align ='right'>";
      if ($rate > 0){
         echo"$update2";
      }
      echo"</td>";
      $aa =$row['doc_no'];        
      //$aa2 =$row['payer'];   
      $aa3=$row['description'];        
      $aa4=$row['type'];   
      //$aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];

    
      echo"<td width ='60' align ='right'>";
      if ($rate < 0){
         echo"$update2";
      }
      echo"</td>";              
      echo"<td width ='50' align ='right'>";
      //echo"$update2";
      echo"</td>";              

      echo"<td width ='60' align ='right'>";
      echo strtolower("$tot2");
echo"</td></tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><b>";      
      echo"Total";      
      echo"</b></td>";      
      echo"<td width ='70' align ='right'>";      
      //echo"$debit";
      echo"</td>";      
      echo"<td width ='30' align ='right'>";      
      //echo"$credit";
      echo"</td>";      
      //echo"<td width ='70' align ='right'>here</td>";      
      echo"<td width ='50' align ='right'></td>";      
      echo"<td width ='50' align ='right'><b>$tot</b></td>";
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
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">                  
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
<a class="brand" href="#">Medi+ V10 (HMIS Global)</a><div class="nav-collapse collapse"><p class="navbar-text pull-right"><a target="_blank" href="http://www.hmisglobal.com" class="navbar-link">www.hmisglobal.com</a></p>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>







<!-- Le styles -->
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<style type="text/css">
	body {
		padding-top: 0px;
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}
	.nav
	{
		margin-bottom:10px;
	}	
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	.alert {
		padding:8px 14px 8px 14px;
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


   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database = "hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");

   echo"<h1>DELIVERY NOTE</h1><br><br>";
   echo"<form action ='delivery_note.php' method ='GET'>";
   echo"<input type='submit' name='print'  class='button' value='Print Report'>";
   //echo"<input type='text' name='search' size='30'>


   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT account_name FROM debtorsfile ORDER BY account_name";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select><br>";








 echo"Date Range From : <input type='text' name='date1' value ='$date1' size='12' > To Date: <input type='text' name='date2' value ='$date2' size='12'><br>";
//echo"<input type='submit' name='print'  class='button' value='Print'>";
echo"</FORM>";


$today = date('y/m/d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $query  = "select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
 }else{
   $query= "SELECT * FROM dtransf WHERE balance > 0 and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

//echo"<table bgcolor ='black' border ='0'>";

                                                         
//echo"<table class='altrowstable' id='alternatecolor'>";
//echo"<tr><th>Date</th><th>Payer Description </th><th width ='300'>Servis Description</th><th>Amount</th><th>Action</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:100px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL ="select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
   //"select * FROM receiptf WHERE towards LIKE '%$search%' ORDER BY date" ;
   
 }else{
   $SQL= "SELECT * FROM dtransf WHERE balance > 0 and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $qty     = 0;

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='70' align ='left'>";      
      echo"$update";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$contact";
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo"$code";
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
      echo"<td width ='50' align ='left'>";      
      echo"$desc";
      echo"</td>";    
      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
         echo"$update2";
      }
      echo"</td>";  

      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
      }else{
         echo"$update2";
      }
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
  
      $bb =$row['acc_no'];                    
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['doc_no'];        
      $aa2 =$row['desc'];   
      $aa3=$row['desc'];        
      $aa4=$row['type'];   
      $aa5=$row['adm_no'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'>$tot</td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='700' align ='left'></td>";
      echo"<td width ='150'><h4></td>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
}
?>