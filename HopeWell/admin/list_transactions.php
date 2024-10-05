<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>﻿
﻿<?php
 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    //$user = "hmisglobal";   
    //$pass = "jamboafrica";   
    //$database = "hmisglob_griddemo";   
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
   echo"<font size ='2'>";
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   echo"<h4><u>ALL TRANSACTIONS (g/lEDGER) REPORT</u></h4><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";

$today = date('y/m/d');
//if (isset($_GET['patients_name'])){
   $search = $_GET['patients_name'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $account= $_GET['account'];
   $patient= $_GET['patients_name'];
   $selected = "No";

   if (isset($_GET['patients_name']) AND !isset($_GET['account'])){
       $query  = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }

   if (!isset($_GET['patients_name']) AND isset($_GET['account'])){
       $query  = "select * FROM htransf WHERE company = '$account' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }

   if (isset($_GET['patients_name']) AND isset($_GET['account'])){
       $query  = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND company = '$account' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }

if ($selected == "No"){
   $query  = "select * FROM htransf WHERE date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
   $selected = "Yes";
}
// }else{
//   $query= "SELECT * FROM htransf WHERE date ='$today' AND ledger ='DB ' ORDER BY date" or die(mysql_error());
//}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Patiend<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:100px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:70px;height:2px;'>";
echo"Price<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
//if (isset($_GET['search'])){
//   $search = $_GET['search'];
//   $SQL ="select * FROM htransf WHERE patients_name LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY //date" ;   
// }else{
//  $SQL= "SELECT * FROM htransf WHERE date ='$today' AND ledger ='DB ' ORDER BY date" or die(mysql_error());
//}
$selected ="No";




   if (isset($_GET['patients_name']) AND !isset($_GET['account'])){
       $SQL  = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }

   if (!isset($_GET['patients_name']) AND isset($_GET['account'])){
       $SQL  = "select * FROM htransf WHERE company = '$account' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }
   if (isset($_GET['patients_name']) AND isset($_GET['account'])){
       $SQL  = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND company = '$account' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY date" ;
    $selected = "Yes";
   }
if ($selected == "No"){
   $SQL= "SELECT * FROM htransf WHERE date >='$date1' AND date <= '$date2' AND ledger ='CR '  ORDER BY date" or die(mysql_error());
}






$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = mysql_result($result,$i,"amount");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"service");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"service");  
      $total   = mysql_result($result,$i,"amount");  
      $qty     = mysql_result($result,$i,"qty");  

      $codes2 = $rate; 
      $update2 = $codes2; 
      if ($pay_mode =='INVOICE' OR $pay_mode =='M-Pesa' OR $pay_mode =='Cheque Receipts' OR $pay_mode =='POST PAID'){         
         $debit = $debit+$rate;
      }else{
         $credit = $credit+$rate;
      }

      $tot = $tot +$total;
      $update2 = number_format($update2);
      $rate = number_format($rate);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo strtolower("$desc");
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo strtolower("$contact");
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo"$code";
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo strtolower("$qty");
      echo"</td>";

      $bb =$row['acc_no'];                    
      echo"<td width ='50' align ='right'>";
      if ($pay_mode =='INVOICE' OR $pay_mode =='M-Pesa' OR $pay_mode =='Cheque Receipts' OR $pay_mode =='POST PAID'){
         echo"$update2";
      }
      echo"</td>";


      echo"<td width ='60' align ='right'>";
      if ($pay_mode =='INVOICE' OR $pay_mode =='M-Pesa' OR $pay_mode =='Cheque Receipts' OR $pay_mode =='POST PAID'){         
      }else{
         echo"$update2";
      }
      echo"</td>";              
      echo"<td width ='10' align ='right'>";
      //echo"$update2";
      echo"</td>";              

      echo"<td width ='60' align ='right'>";
      echo strtolower("$total");
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
      echo"<td width ='70' align ='right'><b>$tot</b></td>";      
      //echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{

   //$mysqlserver="localhost";
   //$mysqlusername="hmisglobal";
   //$mysqlpassword="jamboafrica";
   //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server:  
   //".mysql_error());            
   //$dbname = 'hmisglob_griddemo';
   //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());

   echo"<form action ='list_transactions.php' method ='GET'>";
   echo"<h1>All Transactions Report (G/Ledger)</h1><br><br>";
   echo"<table width ='780' border ='0'><td>";
   echo"<tr><td width='100' align='right'>Date From :</td><td width ='100'><input type='text' name='date1' value ='$date1' size='12'></td><td ='100'></td>"; 
   echo"<td width='100' align='right'>Date To :</td><td width ='100'><input type='text' name='date2' value ='$date2' size='12'></td></tr>"; 

   
//Added the side of Debtors Account selection
//-------------------------------------------
echo"<tr><td width='100' align='right'><b>From Account </b></td><td>";
echo"<select id='account' name='account'>";        
$cdquery="SELECT account_name FROM glaccountsf";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td><td ='100'></td>";


//Added the side of Patients Name selection
//-----------------------------------------
echo"<td width='100' align='right'><b>To Account </b></td><td>";
echo"<select id='ledger_name' name='ledger_name'>";        
$cdquery="SELECT account_name FROM glaccountsf";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
echo"</td></tr><td align ='center'><img src='images/healthcare.png' alt='statement' height='50' width='70'></td><td><input type='submit' name='print'  class='button' value='Print Report'></td></table>";












echo"</FORM>";

//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");





$today = date('y/m/d');
//if (isset($_GET['search'])){
   $search = $_GET['patients_name'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $account= $_GET['account'];
   $patient= $_GET['patients_name'];

//   $query  = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY //date" ;
//   }

 //}else{
   $query= "SELECT * FROM htransf WHERE ledger ='CR ' ORDER BY date" or die(mysql_error());
//}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

//echo"<table bgcolor ='black' border ='0'>";

                                                         
//echo"<table class='altrowstable' id='alternatecolor'>";
//echo"<tr><th>Date</th><th>Description </th><th width ='300'>Narration</th><th>Debit</th><th>Credit</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Description<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Narration<img src='space.jpg' style='width:240px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
//if (isset($_GET['search'])){
//   $search = $_GET['patients_name'];
//   $SQL = "select * FROM htransf WHERE patients_name LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND ledger ='CR ' ORDER BY //date" ;
// }else{
   $SQL= "SELECT * FROM htransf WHERE ledger ='CR ' ORDER BY date" or die(mysql_error());
//}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"patients_name");   
      $rate    = mysql_result($result,$i,"amount");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"service");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"service");  
      $total   = mysql_result($result,$i,"amount");  
      $qty     = mysql_result($result,$i,"qty"); 

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
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
      echo"<td width ='140' align ='right'>$update2</td>";
      echo"<td width ='100' align ='right'></a></td>";
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
      //echo"<td width ='100' align ='right'>";      
      //echo"</td>";      
      //echo"<td width ='10' align ='right'>";      
      //echo"</td>";      
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      //echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
}
?>
