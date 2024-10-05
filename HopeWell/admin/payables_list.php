﻿<?php
session_start();
require('open_database.php');
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
if (isset($_GET['print'])){
 $user = "root";   
 $pass = "";   
 //$database = "phpgrid";   
 //$host = "localhost";   
 //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
 //mysql_select_db($database) or die ("Unable to select the database");
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
   echo"<font size ='4'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   echo"<h4><u>Account Payables Listing</u></h4><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";



 $today = date('y/m/d');

$query= "SELECT * FROM suppliersfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
//echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Account Name<img src='space.jpg' style='width:250px;height:2px;'>";
echo"Address<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Telephone No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Contact<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:100px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM debtorsfile" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = "";  
      $desc    = mysql_result($result,$i,"account_name");   
      $rate    = mysql_result($result,$i,"os_balance");   
      $code   = mysql_result($result,$i,"telephone_no");   
      $update = mysql_result($result,$i,"address");  
      $contact = mysql_result($result,$i,"contact");  
      $street  = " ";  
      $pay_mode= " ";  

      $codes2 = $rate; 
      $update2 = $codes2; 
      if ($pay_mode =='INVOICE'){         
         $debit = $debit+$rate;
      }else{
         $credit = $credit+$rate;
      }

      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$contact";
      echo"</td>";
      
      echo"<td width ='100' align ='right'>";
      if ($pay_mode =='INVOICE'){         
      }else{
      echo"$update2";
         //$credit = $credit+$rate;
      }
      echo"</td>";              
      echo"<td width ='100' align ='right'>$update<img src='ico/Profile.ico' alt='statement' height='12' width='12'></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'>";      
      echo"$debit";
      echo"</td>";      
      echo"<td width ='120' align ='right'>";      
      echo"$credit";
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}

else{

//$user = "root";   
//$pass = "";   
//$database = "phpgrid";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
$query= "SELECT * FROM companyfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM companyfile" or die(mysql_error());
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
   echo"<font size ='4'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   echo"<b>Account Payables</b><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";

















$today = date('y/m/d');
$query= "SELECT * FROM suppliersfile" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<div><b>";
echo"<hr>";
//echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Account Name<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Address<img src='space.jpg' style='width:150px;height:2px;'>";
echo"Telephone No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Contact<img src='space.jpg' style='width:100px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM suppliersfile" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = "";  
      $desc    = mysql_result($result,$i,"account_name");   
      $rate    = mysql_result($result,$i,"os_balance");   
      $code   = mysql_result($result,$i,"telephone_no");   
      $update = mysql_result($result,$i,"address");  
      $contact = mysql_result($result,$i,"contact");  
      $street  = " ";  
      $pay_mode= " ";  

      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='300' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$update";
      echo"</td>";

      echo"<td width ='150' align ='left'>";      
      echo"$code";
      echo"</td>";

      echo"<td width ='200' align ='left'>";      
      echo"$contact";
      echo"</td>";

      echo"<td width ='50' align ='right'>";      
      echo"$rate";
      echo"</td>";

      //echo"<td width ='100' align ='right'>Select<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      //The bottom line
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'>";      
      echo"</td>";      
      echo"<td width ='200' align ='right'>";      
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
}
?>
