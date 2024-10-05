<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
﻿<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
$query  = "select * FROM st_trans WHERE (trans_desc ='ISP' or trans_desc ='CASH') ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th><h3>Issue to Patients Report</h3></th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Item Description<img src='space.jpg' style='width:350px;height:2px;'>";
echo"Narration<img src='space.jpg' style='width:350px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Price<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
$SQL ="select * FROM st_trans WHERE (trans_desc ='ISP' or trans_desc ='CASH') ORDER BY date" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $qty     = mysql_result($result,$i,"qty");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $price   = number_format($rate);
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      $totss = -1*$qty*$rate;
      //$totss =number_format($tots);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='450' align ='left'>";      
      echo"$contact";
      echo"</td>";
      echo"<td width ='450' align ='left'>";      
      echo"$update";
      echo"</td>";
      $qty = -1*$qty;
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$qty</td>";
      echo"<td width ='80' align ='right'>$price</td>";
      $tot_1 = $qty*$price;
      $tot_2 = $tot_2+$tot_1;
      echo"<td width ='30' align ='right'></td>";
      $totss = number_format($tot_1);
      echo"<td width ='60' align ='right'>$tot_1</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot_2);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
//}
die();

//Now go and show summary
//-----------------------

 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 //echo"<h1>Patient Bill</h1><br><br>";
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
$query  = "select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th>Patient Statement</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Payer<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Description <img src='space.jpg' style='width:150px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Paid<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
$SQL ="select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;



while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  
      $balance   = mysql_result($result,$i,"balance");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$balance;
      $update2 = number_format($update2);
      $bals    = number_format($balance);
      $price   = number_format($rate);
      $rate = number_format($total);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='220' align ='left'>";      
      echo"$contact";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$price</td>";
      echo"<td width ='70' align ='right'>$update2</td>";
      echo"<td width ='20' align ='right'></td>";

      echo"<td width ='60' align ='right'>$bals</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
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
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
//}
?>