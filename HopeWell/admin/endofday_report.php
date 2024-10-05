<?php
 session_start();
 require('open_database.php');

?>
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
   echo"<h4><u>CASHIERS SHIFT REPORT</u></h4><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";


$today = date('y-m-d');
$mdate =date('y-m-d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $query  = "select * FROM st_trans WHERE date >='$date1' AND date <= '$date2' AND trans_desc ='CASH RECEIPT' ORDER BY date,ref_no" ;
 }else{
   $query= "SELECT * FROM st_trans WHERE date ='$today' AND trans_desc ='CASH RECEIPT' ORDER BY date,ref_no" or die(mysql_error());
}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:70px;height:2px;'>";
echo"Payer<img src='space.jpg' style='width:190px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Price<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Paid<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL ="select * FROM st_trans WHERE date >='$date1' AND date <= '$date2' AND trans_desc ='CASH RECEIPT' ORDER BY date,ref_no" ;   
 }else{
  $SQL= "SELECT * FROM st_trans WHERE date ='$today' AND trans_desc ='CASH RECEIPT' ORDER BY date,ref_no" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$docno ='';
echo"<font size ='1'>";
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
      $qty     = mysql_result($result,$i,"qty");  

      //if ($codes =$date1){      
         $codes2 = $rate; 
         $update2 = $codes2; 

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
      echo"<td width ='300' align ='left'>";      
      echo strtolower("$contact");
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo strtolower("$qty");
      echo"</td>";

      $bb =$row['acc_no'];                    


      $aa =$row['ref_no'];        
      $aa2 =$row['payer'];   
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];

      echo"<td width ='60' align ='right'>";
      if ($pay_mode =='INVOICE' OR $pay_mode =='M-Pesa' OR $pay_mode =='Cheque Receipts' OR $pay_mode =='POST PAID'){         
      }else{
         echo"$update2";
      }
      echo"</td>";              
      //echo"<td width ='10' align ='right'>";
      //echo"$update2";
      //echo"</td>";              

      echo"<td width ='60' align ='right'>";
      echo strtolower("$total");
      echo"</td>";
      $paid =0;
      if ($code<>$docno){   
         $query3 = "select * FROM receiptf WHERE ref_no ='$code'" ;
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;      
         while ($i3 < $num3)
           { 
           $paid   = mysql_result($result3,$i3,"total");
           $docno  = mysql_result($result3,$i3,"ref_no");
           $i3++;
           }
        }
      echo"<td width ='60' align ='right'>";
      echo strtolower("$paid");
      echo"</td>";

      $i++;      
     }
//}
      echo"</tr></table>";
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
   echo"<h1>Cashiers Collection Report</h1><br><br>";
   echo"<form action ='endofday_report.php' method ='GET'>";
   echo"<input type='submit' name='print'  class='button' value='Print Report'>";
   echo"<input type='text' name='search' size='30'> Date Range From : <input type='text' name='date1' value ='$date1' size='12' > To Date: <input type='text' name='date2' value ='$date2' size='12'><br>";
//echo"<input type='submit' name='print'  class='button' value='Print'>";
echo"</FORM>";

//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $query  = "select * FROM receiptf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND trans_desc ='CASH RECEIPT' ORDER BY date" ;
 }else{
   $query= "SELECT * FROM receiptf WHERE date ='$today' AND trans_desc ='CASH RECEIPT' ORDER BY date" or die(mysql_error());
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
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Payer<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:240px;height:2px;'>";
echo"Amount<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL ="select * FROM receiptf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' AND trans_desc ='CASH RECEIPT' ORDER BY date" ;
   //"select * FROM receiptf WHERE towards LIKE '%$search%' ORDER BY date" ;
   
 }else{
//$SQL = "select * FROM receiptf ORDER BY date" ;
   $SQL= "SELECT * FROM receiptf WHERE date ='$today' AND trans_desc ='CASH RECEIPT' ORDER BY date" or die(mysql_error());
}
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
      $bb =$row['acc_no'];              
      echo"<td width ='140' align ='right'>$update2</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
echo"1223";  
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
}
?>
