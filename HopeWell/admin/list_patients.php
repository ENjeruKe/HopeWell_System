﻿<?php
   //session_start();
require('open_database.php');
?>
<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
if (isset($_GET['print'])){
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
   echo"<h2><u>Patients List</u></h2><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";



 $today = date('y/m/d');

$query= "SELECT * FROM clients" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"File No.<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Patients Name<img src='space.jpg' style='width:250px;height:2px;'>";
echo"Gender<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Age<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Telephone No.<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"C<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:100px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM clients" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = "";  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"telephone");   
      $update = mysql_result($result,$i,"age");  
      $contact = mysql_result($result,$i,"sex");  
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
   echo"<b>Patients List</b><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";

















$today = date('y/m/d');
$query= "SELECT * FROM clients ORDER BY patients_name" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<div><b>";
echo"<hr>";
echo"File No.<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Patients Name<img src='space.jpg' style='width:200px;height:2px;'>";
echo"Gender <img src='space.jpg' style='width:50px;height:2px;'>";
echo"Telephone No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Age<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Payee<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor'>";
$SQL= "SELECT * FROM clients ORDER BY patients_name" or die(mysql_error());
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = "";  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"phone");   
      $update = mysql_result($result,$i,"gender");  
      $contact = mysql_result($result,$i,"pay_account");  
      $adm_no = mysql_result($result,$i,"adm_no");  

      $street  = " ";  
      $pay_mode= " ";  

      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$adm_no";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo"$update";
      echo"</td>";
      echo"<td width ='70' align ='left'>";      
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
