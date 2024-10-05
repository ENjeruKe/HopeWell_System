<?php
session_start();
 require('open_database.php');
include 'includes/conn.php'; 

?>






<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">




ï»¿<?php
 $branch     = $_SESSION['company']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');



 if (isset($_GET['print'])){

   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];

   
   $time1  = $_GET['time1'];
   $time2  = $_GET['time2'];
   $time1a  = $_GET['time1'];
   $time2a  = $_GET['time2'];

   $date1x  = $date1.$time1;
   $date2x  = $date2.$time2;

   
   //$date2 = $date2.' 24:60:60';


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

   echo"<h4>CASHIERS SHIFT REPORT <img src='space.jpg' style='width:20px;height:2px;'>"."Dated from: ".$date1."<img src='space.jpg' style='width:3px;height:2px;'>".$time1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2."<img src='space.jpg' style='width:3px;height:2px;'>".$time2;
echo"</h4>";
//   echo"Dated from: ".$date1."<img src='space.jpg' style='width:20px;height:2px;'>"."To :".$date2;

   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";





$today = date('y-m-d');
$mdate =date('y-m-d');
//$date1  = $_GET['date1'];
//$date2  = $_GET['date2'];

//$query  = "select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no" ;
$query ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no" ;   

$result =mysql_query($query);
$num =mysql_numrows($result);





$tot =0;
$i = 0;
                                                         






?>
<table width ='100%'>
<tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr>
<hr>
<u>CASH RECEIPTS</u><br>

<?php
//$date2 = $date2.' 24:00:00';
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$start_date = $date1.' '.$time1;
$end_date = $date2.' '.$time2;

$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";
       //echo "<td>" . $row['ref_no'] . "</td>";

      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";

       echo "<td>" . $row['description'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";

         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";
?>

<u>EFT RECEIPTS</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
$SQL ="select * FROM receiptf WHERE date >='$date1' and date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='EFT' and $my_date >=$start_date and $my_date <=$end_date){
    //if ($types=='EFT'){
       //$dates = substr($row['date'],0,10);
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
       
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";




      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


       echo "<td>" . $row['description'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";









         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";





?>







<u>M-PESA RECEIPTS</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
//$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no,trans_desc" ;   
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='M-PESA' and $my_date >=$start_date and $my_date <=$end_date){
    //if ($types=='M-PESA'){
       //$dates = substr($row['date'],0,10);
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";




      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


       echo "<td>" . $row['description'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";









         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";





?>



<u>CASH AND MPESA</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
//$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no,trans_desc" ;   
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash / M-pesa' and $my_date >=$start_date and $my_date <=$end_date){
    //if ($types=='CHEQUES'){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";
       //echo "<td align ='left' width ='100'>" . $row['ref_no'] . "</td>";

      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";
       echo "<td>" . $row['description'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill3 = $tot_bill3 +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill3);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";

         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";
?>






<u>CHEQUES</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
//$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no,trans_desc" ;   
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='CHEQUES' and $my_date >=$start_date and $my_date <=$end_date){
    //if ($types=='CHEQUES'){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";
       //echo "<td align ='left' width ='100'>" . $row['ref_no'] . "</td>";

      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";
       echo "<td>" . $row['description'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill3 = $tot_bill3 +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill3);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";

         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";
?>






<u>BANK TRANSFERS</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Description of Service</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php
//$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' ORDER BY date,ref_no,trans_desc" ;   
$SQL ="select * FROM receiptf WHERE date >='$date1' AND date <= '$date2' and location<>'skip' ORDER BY date,ref_no,trans_desc" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='BANK TRANSFER' and $my_date >=$start_date and $my_date <=$end_date){
    //if ($types=='CHEQUES'){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       
       $dates = $dates.' '.$times;
       
       echo "<tr>";
       echo "<td>" . $dates . "</td>";
       echo "<td width ='350'>" . $row['type'] . "</td>";
       //echo "<td align ='left' width ='100'>" . $row['ref_no'] . "</td>";

      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['trans_desc'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";





       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";
       echo "<td>" . $row['description'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($row['total']) . "</td>";
       $paid = $row['total'];
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill3 = $tot_bill3 +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;

       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill3);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";

         $i++;      
        }
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";
?>

<!--//Get Invoices
//---------- -->
<u>INVOICES</u><br>
<table width ='100%'>
<!--tr>
<th bgcolor ='black' width ='100'><font color ='white'>Date</th>
<th bgcolor ='black' width ='350' align ='left'><font color ='white'>Patient</th>
<th bgcolor ='black' width ='50' align ='left'><font color ='white'>Ref.No..:</th>
<th bgcolor ='black' width ='200' align ='left'><font color ='white'>Payer</th>
<th bgcolor ='black' width ='100'><font color ='white'>Amount</th>
<th bgcolor ='black' width ='100'><font color ='white'>Run Tot.</th>
</tr-->
<?php



$SQL ="select * FROM hdnotef WHERE CONCAT(date,time) >='$date1x' AND CONCAT(date,time) <= '$date2x' ORDER BY date,invoice_no" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    //$types = $row['inputby'];
    echo"<font size ='2'>";
    //if ($types=='M-PESA'){
       echo "<tr>";
       echo "<td>" . $row['date'] . "</td>";
       echo "<td width ='350'>" . $row['patients_name'] . "</td>";




      $_SESSION['ref_no'] =$row['invoice_no'];  
      $aa =$row['invoice_no'];        
      $aa2 ='INV';
      //$row['type'];   
      $aa3=$row['username'];        
      $aa4='INV';
      //$row['type'];   
      $aa5=$row['pay_account'];   
      //$aa6=$row['type'];        
      //$aa7=$row['date'];        
      //echo"<td width ='100' align ='right'></td>";
      $amounts=$row['tot_amount']; 
//      if ($amounts<=0){
//           $amounts = $amounts*-1;
//       }

      $aak =substr($aa,0,1);
      $amounts = $row['tot_amount'];
      if ($aak =='K'){
      
      $SQL2 ="select invoice_no,sum(amount*qty) FROM htransf WHERE invoice_no='$aa'" ;   
      $hasil2=mysql_query($SQL2, $connect);
      while ($row=mysql_fetch_array($hasil2)) {
            $amounts = $row['sum(amount*qty)'];
      }
      }
       echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


       echo "<td>" . $aa5 . "</td>";
       


       //echo "<td><a href=javascript:popcontact3('reprint_receipt.php?account=$aa')>$aa</a></td>";


       //echo "<td>" . $row['pay_account'] . "</td>";
       //echo "<td align ='right'>" . $row['total'] . "</td>";
       echo "<td align ='right'>" . number_format($amounts) . "</td>";
       
       $paid = $amounts;
       //$row['tot_amount'];
       if ($paid<=0){
           $paid = $paid*-1;
       }
       $codes2 = $paid; 
       $update2 = $codes2; 
       $tot_bill = $tot_bill +$paid;
       $tot      = $tot +$total;
       $tot_paid = $tot_paid +$paid;
       $amountsx = $amountsx+$amounts;
       $update2 = number_format($update2);
       $rate = number_format($paid);
       $tot_bill2 = number_format($tot_bill);
       //echo strtolower("$tot_bill2");
       echo "<td align ='right'>" . $tot_bill2. "</td>";
       echo "</tr>";









         $i++;      
        //}
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot_bill = number_format($tot_bill);
      $tot_paid = number_format($tot_paid);
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='300'>";
      echo"</td>";      
      //echo"<td width ='70'align ='right'><b>$tot_bill";      
      echo"</b></td>";      
      //echo"<td width ='70' align ='right'>$tot_bill2";      
      echo"</td>";      
      echo"<td width ='200' align ='center'>";      
      echo"Total";      
      echo"</td>";          
      echo"<td width ='70' align ='right'><b>$tot_bill2</b></td>";      
      echo"</tr>";   
      echo"</font>";
      echo"</table>";


      echo"<hr>";
      
//Correct pending bills
//---------------------
$query = "SELECT date,ref_no FROM receiptf WHERE date >='$date1' AND date <= '$date2' GROUP BY ref_no"; 	 
$result = mysql_query($query);
while($row = mysql_fetch_array($result)){
$refs_no =$row['ref_no']; 
//echo "$refs_no";
//$query2="update auto_transact set balance = credit_rate where invoice_no ='$refs_no'";
//$result2 = mysql_query($query2);
}








      echo"<hr>";


      echo"<hr>";
    $latss = 0;
    $xcv = 0;
    $latssaa = 0;
    $xcvee = 0;
    $latex = 0;
    $latess = 0;
    $latiss = 0;
    $latessx =0;
//    $sql = "SELECT SUM(total) as sale FROM pay_datacash WHERE  date >='$date1' AND date <= '$date2' AND trans_desc ='Cash Receipts' and time >='$time1a' and time <='$time2a'";
//    $query = $conn->query($sql);
//    $ontime4 = $query->fetch_assoc();
//    $latss = $ontime4['sale'];
    
    
    $SQL ="SELECT * FROM receiptf WHERE  date >='$date1' AND date <= '$date2'" ;   

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq =$row['total'];
       $latss =$latss+$qq;
       
    }

        if ($types=='M-PESA' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2 =$row['total'];
       $xcv =$xcv+$qq2;
       
    }

        if ($types=='EFT' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2a =$row['total'];
       $latex =$latex+$qq2a;
       
    }
        if ($types=='CHEQUES' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2s =$row['total'];
       $latess =$latess+$qq2s;
       
    }

       if ($types=='BANK TRANSFER' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2sx =$row['total'];
       $latessx =$latessx+$qq2sx;
       
    }

 
       if ($types=='Cash / M-pesa' and $my_date >=$start_date and $my_date <=$end_date){

    }


 
}   
 
//Try to look for mpesa an cash combined in pay_data cash file
//------------------------------------------------------------
$SQL ="SELECT * FROM pay_datacash WHERE  description ='Cash / M-pesa' and date >='$date1' AND date <= '$date2'" ;   
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$tot_bill3 = 0;
$tot_paid = 0;
$tot_bill2= 0;
$docno ='';

while ($row=mysql_fetch_array($hasil)) {
    $types = $row['trans_desc'];
    $dates = substr($row['date'],0,10);
    $times = substr($row['time'],0,8);
    $my_date = $dates.' '.$times;  
    echo"<font size ='2'>";
    if ($types=='Cash Receipts' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq =$row['total'];
       $latssaa =$latssaa+$qq;
       
    }

        if ($types=='M-PESA' and $my_date >=$start_date and $my_date <=$end_date){
       $dates = substr($row['date'],0,10);
       $times = substr($row['time'],0,8);
       $dates = $dates.' '.$times;
       $qq2 =$row['total'];
       $xcvee =$xcvee+$qq2;
       
    }
}   
    
//End of search in pay_data cash
//------------------------------
//Confirmed for successful search and update
//------------------------------------------





  
$aba =$latss+$latssaa;
$bba =$xcv+$xcvee;

echo " <table width ='100%'>";

echo "<tr><td width ='25%'></td><td width ='25%'><b>CASH SALES</b></td><td width ='25%'>Ksh $aba</td><td width ='25%'></td></tr>";

    //  echo"<hr>";
echo "<tr><td width ='25%'></td><td width ='25%'><b>M-PESA SALES</b></td><td width ='25%'>Ksh $bba</td><td width ='25%'></td></tr>";
 //     echo"<hr>";
echo "<tr><td width ='25%'></td><td width ='25%'><b>EFT SALES</b></td><td width ='25%'>Ksh $latex</td><td width ='25%'></td></tr>";
    //  echo"<hr>";
echo "<tr><td width ='25%'></td><td width ='25%'><b>CHEQUES SALES</b></td><td width ='25%'>Ksh $latess</td><td width ='25%'></td></tr>";
    //  echo"<hr>";
echo "<tr><td width ='25%'></td><td width ='25%'><b>BANK TRANSFER</b></td><td width ='25%'>Ksh $latessx</td><td width ='25%'></td></tr>";

echo "<tr><td width ='25%'></td><td width ='25%'><b>CREDIT SALES</b></td><td width ='25%'>Ksh $amountsx</td><td width ='25%'></td></tr>";

$zaapo =$aba+$bba+$latex+$latess+$latessx+$amountsx;

echo "<tr><td width ='25%'></td><td width ='25%'><b>TOTAL SALES</b></td><td width ='25%'>Ksh $zaapo</td><td width ='25%'></td></tr>";

echo "</table>";


      echo"<hr>";


      die();
}else{
}
?>








<!DOCTYPE html>
<html>
<title>HMIS Global</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<div class="w3-container w3-teal">
  <h1>Cash Collection Report | <font color ='red'></font></h1>
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
  echo"<form action ='endofday_report2.php' method ='GET'>";
  echo"<table><tr><td width ='50'>From Date:</td><td><input type='date' name='date1' value ='$date1' size='12' ></td>";
  echo"<td width='50'>";

echo"<input type='time' name='time1' size='12' ></td></tr>";
  
  echo"<tr><td width='50'>To Date:</td><td><input type='date' name='date2' value ='$date2' size='12'></td>";
  
  echo"<td width='50'>";

echo"<input type='time' name='time2' size='12' ></td></tr>";
  
  echo"<tr><td width='50'><input type='submit' name='print'  class='button' value='Print Report'></td><td></td></tr>";
echo"</FORM>";


$today = date('y/m/d');
//$today = $date-1;

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

	
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</html>
